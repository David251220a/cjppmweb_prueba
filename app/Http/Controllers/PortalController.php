<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordChangeRequest;
use App\Models\Affiliate;
use App\Models\AffiliateAddress;
use App\Models\AffiliateHealth;
use App\Models\AffiliateJob;
use App\Models\AffiliateReference;
use App\Models\Loan;
use App\Models\LoanRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PortalController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function accountOption(Request $request)
    {
        switch ($request->option) {
            case 'activate':
                $user = User::find($request->user);
                $user->active = 1;
                $user->save();
                return redirect()->back()->with(['message' => 'Cuenta activada'])->withInput();
                break;
            case 'email':
                $user = User::find($request->user);
                $user->email_verified_at = now();
                $user->save();
                return redirect()->back()->with(['message' => 'Email verificado manual'])->withInput();
                break;
            case 'phone':
                $user = User::find($request->user);
                $user->phone_verified_at = now();
                $user->save();
                return redirect()->back()->with(['message' => 'Telefono verificado manual'])->withInput();
                break;
            case 'password':
                $password = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);;
                $user = User::find($request->user);
                $user->password = bcrypt($password);
                $user->save();
                return redirect()->back()->with(['message' => 'Contraseña reseteada a: ' . $password])->withInput();
                break;
            case 'role':
                $user = User::find($request->user);
                $user->syncRoles($request->rol);
                return redirect()->back()->with(['message' => 'Rol actualizado'])->withInput();
                break;
        }
        return redirect()->back()->withErrors('Ha ocurrido un error');
    }

    public function password()
    {
        return view('users.password');
    }

    public function passwordSend(PasswordChangeRequest $request)
    {
        if (Hash::check($request->password, Auth::user()->password)) {
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->newpassword);
            $user->save();
            return redirect()->back()->with(['message' => 'La contraseña ha sido cambiada'])->withInput();
        } else {
            return redirect()->back()->withErrors('La contraseña actual no es correcta')->withInput();
        }
    }


    public function aportes()
    {
        $affiliate = Affiliate::where('document_number', Auth::user()->document_number)->first();
        $data = DB::table('cobol_aporte_extracto')->where('Id_Legajo', $affiliate->folder_id)->orderByDesc('Fecha_Aporte')->get();
        return view('aporte', [
            'data' => $data
        ]);
    }

    public function prestamos()
    {
        $data = DB::table('cobol_prestamo')->where('CedulaIdentidad', Auth::user()->document_number)->get();
        $data2 = DB::table('cobol_prestamo_morosidad')->select(
            DB::raw("SUM(Monto_Cuota_Saldo) as Monto_Total_Cuota_Saldo"),
            DB::raw("SUM(Monto_Cuota_Interes_Saldo) as Monto_Total_Cuota_Interes_Saldo"),
            DB::raw("SUM(Monto_Cuota_Amortizacion_Saldo) as Monto_Total_Cuota_Amortizacion_Saldo"),
            DB::raw("SUM(MontoCuota_Interes_Punitorio_Saldo) as Monto_Total_Cuota_Interes_Punitorio_Saldo"),
            DB::raw("SUM(MontoCuota_Interes_Punitorio_Congelado) as Monto_Total_Cuota_Interes_Punitorio_Congelado"),
            DB::raw("SUM(Monto_Cuota_Seguro_Saldo) as Monto_Total_Cuota_Seguro_Saldo"),
            DB::raw("SUM(IVA) as Monto_Total_IVA"),
        )->where('CedulaIdentidad', Auth::user()->document_number)->get();

        $loan = Loan::where('active', 1)->get();

        if ($data2[0]->Monto_Total_Cuota_Saldo == 0) {
            $data2 = null;
        }

        $data3 = LoanRequest::where('affiliate_id',  Auth::user()->affiliate->id)->get();

        return view('prestamo', compact('loan', 'data', 'data2', 'data3'));
    }

    public function prestamosSolicitar()
    {
        if (Auth::user()->affiliate->municipality->benefit != 1) {
            return redirect()->back()->withErrors('Lo lamentamos el municipio al cual estas vinculado, no tiene activo este beneficio.');
        }

        $mora = DB::table('cobol_prestamo_morosidad')->where('CedulaIdentidad', Auth::user()->document_number)->get();
        if (count($mora) > 0) {
            return redirect()->back()->withErrors('Lo lamentamos su cuenta posee morosidad, favor comuniquese con el Dpto de Prestamo.');
        }

        $capacity = $this->capacity(Auth::user()->affiliate->id);
        if (($capacity['available'] - ($capacity['loan'] + $capacity['loan_defaulter'])) <= 0) {
            return redirect()->back()->withErrors('Ha alcanzado el límite de crédito, tu cuenta se maximiza y el crédito disponible es cero.');
        }

        return view('prestamoNew', [
            'loan' => Loan::where('active', 1)->get(),
            'capacity' => $capacity,
        ]);
    }

    public function prestamosSolicitarPost(Request $request)
    {
        $capacity = $this->capacity(Auth::user()->affiliate->id);

        if (($capacity['available'] - ($capacity['loan'] + $capacity['loan_defaulter'])) < $request->amount) {
            return redirect()->back()->withErrors('No puede solicitar un monto mayor a tu limite permitido.');
        }

        AffiliateAddress::updateOrCreate([
            'address' => $request->address,
            'city' => $request->city,
            'neighborhood' => $request->neighborhood,
            'affiliate_id' => Auth::user()->affiliate->id
        ]);

        AffiliateJob::updateOrCreate([
            'position' => $request->position,
            'dependence' => $request->dependence,
            'phone' => $request->phone,
            'salary' => $request->salary,
            'affiliate_id' => Auth::user()->affiliate->id
        ]);

        AffiliateReference::updateOrCreate([
            'name' => $request->ref1name,
            'address' => $request->ref1address,
            'phone' => $request->ref1phone,
            'affiliate_id' => Auth::user()->affiliate->id
        ]);

        AffiliateReference::updateOrCreate([
            'name' => $request->ref2name,
            'address' => $request->ref2address,
            'phone' => $request->ref2phone,
            'affiliate_id' => Auth::user()->affiliate->id
        ]);

        AffiliateHealth::updateOrCreate([
            'disease' => $request->disease,
            'disease_text' => $request->disease_text,
            'surgery' => $request->surgery,
            'surgery_text' => $request->surgery_text,
            'surgery_future' => $request->surgery_future,
            'surgery_future_text' => $request->surgery_future_text,
            'smoke' => $request->smoke,
            'sport' => $request->sport,
            'motorcycle' => $request->motorcycle,
            'routine' => $request->routine,
            'routine_text' => $request->routine_text,
            'height' => $request->height,
            'weight' => $request->weight,
            'affiliate_id' => Auth::user()->affiliate->id
        ]);

        $prestamo = LoanRequest::where('loan_id', $request->loan)->where('passive', Auth::user()->affiliate->type->active ? 0 : 1)->max('number');

        $lrequest = LoanRequest::create([
            'passive' => Auth::user()->affiliate->type->active ? 0 : 1,
            'number' => $prestamo + 1,
            'amount' => $request->amount,
            'time' => $request->time,
            'previous' => $request->previous,
            'loan_id' => $request->loan,
            'status_id' => 1,
            'affiliate_id' => Auth::user()->affiliate->id
        ]);

        return redirect()->route('prestamos')->with(['message' => "Solicitud realizada " . $lrequest->loan->exp . ($lrequest->passive == '1' ? $lrequest->loan->exp_passive : $lrequest->loan->exp_active) . 100000 + $lrequest->number]);
    }
}
