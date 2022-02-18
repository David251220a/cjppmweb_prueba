<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\Loan;
use App\Models\LoanRequest;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:loan.index')->only('index');
        $this->middleware('permission:loan.create')->only('create');
        $this->middleware('permission:loan.create')->only('store');
        $this->middleware('permission:loan.show')->only('show');
        $this->middleware('permission:loan.edit')->only('edit');
        $this->middleware('permission:loan.edit')->only('update');
        $this->middleware('permission:loan.destroy')->only('destroy');
    }

    public function index()
    {
        $data = Loan::get();
        return view('loan.index', compact('data'));
    }

    public function create()
    {
        return view('loan.create');
    }

    public function store(Request $request)
    {
        Loan::create($request->all());
        return redirect()->route('loan.index')->with(['message' => 'Registro exitoso!']);
    }

    public function show(Loan $prestamo, Request $request)
    {
        if ($request->search) {
            $afi = Affiliate::where('document_number', $request->search)->first();
            $sql = LoanRequest::where('number', 'LIKE', '%' . $request->search . '%')->orWhere('affiliate_id', @$afi->id)->where('loan_id', $prestamo->id)->orderByDesc('number')->paginate(50);
        } else {
            $sql = LoanRequest::where('loan_id', $prestamo->id)->orderByDesc('number')->paginate(50);
        }
        return view('loan.show', [
            'data' => $prestamo,
            'request' => $sql
        ]);
    }

    public function edit(Loan $prestamo)
    {
        return view('loan.edit', [
            'data' => $prestamo,
        ]);
    }

    public function update(Request $request, Loan $prestamo)
    {
        $prestamo->update($request->all());
        return redirect()->route('loan.index')->with(['message' => 'Registro exitoso!']);
    }
}
