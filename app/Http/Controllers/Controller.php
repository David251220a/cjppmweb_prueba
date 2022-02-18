<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function capacity($id)
    {
        $affiliate = Affiliate::find($id);
        $loan = DB::table('cobol_prestamo')->select(DB::raw("SUM(Monto_Amortizacion_Total_SaldoActual) as total"))->where('CedulaIdentidad', $affiliate->document_number)->get();
        $data['loan'] = $loan[0]->total;
        $loan_defaulter = DB::table('cobol_prestamo_morosidad')->select(DB::raw("SUM(Monto_Cuota_Saldo + MontoCuota_Interes_Punitorio_Saldo + MontoCuota_Interes_Punitorio_Congelado + Monto_Cuota_Seguro_Saldo + IVA) as total"))->where('CedulaIdentidad', $affiliate->document_number)->get();
        $data['loan_defaulter'] = $loan_defaulter[0]->total;
        if ($affiliate->type->active) {
            $contribution = DB::table('cobol_aporte')->select(DB::raw("SUM(Total_Aporte_Personal + Total_Primera_Asignacion + Total_Diferencia_Asignacion + Total_RSA_Deuda) as total"))->where('Id_Legajo', $affiliate->folder_id)->get();
            $data['available'] = $contribution[0]->total;
        } else {
            $salary = 2192839;
            $data['available'] = $salary * 24;
        }
        return $data;
    }

    public function month()
    {
        return [null, "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    }
}
