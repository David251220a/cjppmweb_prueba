<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\AffiliateAddress;
use App\Models\AffiliateHealth;
use App\Models\AffiliateJob;
use App\Models\AffiliateReference;
use App\Models\Loan;
use App\Models\LoanFile;
use App\Models\LoanRequest;
use App\Models\LoanStatus;
use Illuminate\Http\Request;
use PDF;

class LoanRequestController extends Controller
{
    public function create(Loan $loan, Request $request)
    {
        if ($request->document) {
            $affiliate = Affiliate::where('document_number', $request->document)->first();
            if ($affiliate) {
                $capacity = $this->capacity($affiliate->id);
                return view('loan.request-c', compact('affiliate', 'loan', 'capacity'));
            } else {
                return redirect()->back()->withInput()->withErrors('No existe el afiliado.');
            }
        }
        return view('loan.request-c');
    }

    public function store(Loan $loan, Request $request)
    {
        $affiliate = Affiliate::find($request->id);

        AffiliateAddress::updateOrCreate([
            'address' => $request->address,
            'city' => $request->city,
            'neighborhood' => $request->neighborhood,
            'affiliate_id' => $affiliate->id
        ]);

        AffiliateJob::updateOrCreate([
            'position' => $request->position,
            'dependence' => $request->dependence,
            'phone' => $request->phone,
            'salary' => $request->salary,
            'affiliate_id' => $affiliate->id
        ]);

        AffiliateReference::updateOrCreate([
            'name' => $request->ref1name,
            'address' => $request->ref1address,
            'phone' => $request->ref1phone,
            'affiliate_id' => $affiliate->id
        ]);

        AffiliateReference::updateOrCreate([
            'name' => $request->ref2name,
            'address' => $request->ref2address,
            'phone' => $request->ref2phone,
            'affiliate_id' => $affiliate->id
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
            'affiliate_id' => $affiliate->id
        ]);

        $prestamo = LoanRequest::where('loan_id', $loan->id,)->where('passive', $affiliate->type->active ? 0 : 1)->max('number');

        $lrequest = LoanRequest::create([
            'passive' => $affiliate->type->active ? 0 : 1,
            'number' => $prestamo + 1,
            'amount' => $request->amount,
            'time' => $request->time,
            'previous' => $request->previous,
            'loan_id' => $loan->id,
            'status_id' => 1,
            'affiliate_id' => $affiliate->id
        ]);

        return redirect()->route('loan.show', $loan)->with(['message' => "Solicitud realizada " . $lrequest->loan->exp . ($lrequest->passive == '1' ? $lrequest->loan->exp_passive : $lrequest->loan->exp_active) . 100000 + $lrequest->number]);
    }

    public function show(Loan $loan, LoanRequest $lrequest)
    {
        $pdf = PDF::loadView('documents.loan', [
            'data' => $lrequest
        ]);
        
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                'allow_self_signed'=> TRUE,
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
            ]
        ]));

        return $pdf->stream('cjppm.pdf');
    }

    public function edit(Loan $loan, LoanRequest $lrequest)
    {
        $data = $lrequest;
        $capacity = $this->capacity($lrequest->affiliate_id);
        $status = LoanStatus::get();
        return view('loan.request-e', compact('data', 'capacity', 'status'));
    }

    public function update(Request $request, Loan $loan, LoanRequest $lrequest)
    {
        if (!empty($request->expc)) {
            if ($lrequest->number == $request->expc) {
                return redirect()->back()->withInput()->withErrors('El expediente es el mismo.');
            } else {
                if (is_numeric($request->expc)) {
                    $check = LoanRequest::where('passive', $lrequest->passive)->where('number', $request->expc)->first();
                    if ($check) {
                        LoanRequest::where('id', $lrequest->id)->update(['number' => $check->number]);
                        LoanRequest::where('id', $check->id)->update(['number' => $lrequest->number]);
                        return redirect()->back()->withInput()->with(['message' => 'Se ha modificado el expediente']);
                    } else {
                        return redirect()->back()->withInput()->withErrors('No existe el expediente para remplazar');
                    }
                } else {
                    if (strpos($request->expc, 'CREAR') !== false) {
                        $number = preg_replace('/[^0-9]/', '', $request->expc);
                        $check2 = LoanRequest::where('passive', $lrequest->passive)->where('number', $number)->first();
                        if ($check2) {
                            return redirect()->back()->withInput()->withErrors('Existe un expediente con ese numero');
                        } else {
                            $max = LoanRequest::where('loan_id', $lrequest->id,)->where('passive', $lrequest->passive)->max('number');
                            if ($max >= $number) {
                                return redirect()->back()->withInput()->withErrors('No puede ser menor al actual');
                            } else {
                                LoanRequest::where('id', $lrequest->id)->update(['number' => $number]);
                                return redirect()->back()->withInput()->with(['message' => 'Se ha modificado el expediente']);
                            }
                        }
                    } else {
                        if ($request->expc == 'TRANSFERIR') {
                            if ($lrequest->passive == 1) {
                                $passive = 0;
                            } else {
                                $passive = 1;
                            }
                            $max = LoanRequest::where('loan_id', $lrequest->loan_id)->where('passive', $passive)->max('number');
                            LoanRequest::where('id', $lrequest->id)->update(['passive' => $passive, 'number' => $max + 1]);
                            return redirect()->back()->withInput()->with(['message' => 'Se ha modificado el expediente']);
                        }
                    }
                    return redirect()->back()->withInput()->withErrors('No se puede cambiar el expediente algo no es valido');
                }
            }
        } else if (!empty($request->file('ffile'))) {
            $file = $request->file('ffile')->store('upload/loan');
            LoanFile::create([
                'name' => $request->fname,
                'value' => $file,
                'loan_id' => $lrequest->id,
            ]);
            return redirect()->back()->withInput()->with(['message' => 'Se ha modificado el expediente']);
        } else {
            $affiliate = Affiliate::find($request->id);

            AffiliateAddress::updateOrCreate([
                'address' => $request->address,
                'city' => $request->city,
                'neighborhood' => $request->neighborhood,
                'affiliate_id' => $affiliate->id
            ]);

            AffiliateJob::updateOrCreate([
                'position' => $request->position,
                'dependence' => $request->dependence,
                'phone' => $request->phone,
                'salary' => $request->salary,
                'affiliate_id' => $affiliate->id
            ]);

            AffiliateReference::updateOrCreate([
                'name' => $request->ref1name,
                'address' => $request->ref1address,
                'phone' => $request->ref1phone,
                'affiliate_id' => $affiliate->id
            ]);

            AffiliateReference::updateOrCreate([
                'name' => $request->ref2name,
                'address' => $request->ref2address,
                'phone' => $request->ref2phone,
                'affiliate_id' => $affiliate->id
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
                'affiliate_id' => $affiliate->id
            ]);

            $lrequest->update([
                'amount' => $request->amount,
                'time' => $request->time,
            ]);

            return redirect()->back()->withInput()->with(['message' => 'Se ha modificado el expediente']);
        }
    }

    public function status(Request $request, Loan $loan, LoanRequest $lrequest)
    {
        $status = LoanStatus::get();
        return view('loan.request-s', compact('lrequest', 'status'));
    }

    public function statusSend(Request $request, Loan $loan, LoanRequest $lrequest)
    {
        $lrequest->status_id = $request->status_id;
        $lrequest->save();
        return redirect()->back()->withInput()->with(['message' => 'Se ha modificado el expediente']);
    }
}
