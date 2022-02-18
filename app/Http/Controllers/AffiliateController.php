<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\AffiliateType;
use App\Models\Civil;
use App\Models\Municipality;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:affiliate.index')->only('index');
        $this->middleware('permission:affiliate.create')->only('create');
        $this->middleware('permission:affiliate.create')->only('store');
        $this->middleware('permission:affiliate.show')->only('show');
        $this->middleware('permission:affiliate.edit')->only('edit');
        $this->middleware('permission:affiliate.edit')->only('update');
    }

    public function index(Request $request)
    {
        if ($request->search) {
            $data = Affiliate::where('name', 'LIKE', '%' . $request->search . '%')->orWhere('lastname', 'LIKE', '%' . $request->search . '%')->orWhere('document_number', 'LIKE', '%' . $request->search . '%')->orderBy('document_number')->paginate(50);
        } else {
            $data = Affiliate::orderBy('document_number')->paginate(50);
        }
        return view('affiliate.index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        $civil = Civil::get();
        $municipality = Municipality::get();
        $type = AffiliateType::get();
        return view('affiliate.create', compact('civil', 'municipality', 'type'));
    }

    public function store(Request $request)
    {
        Affiliate::create($request->all());
        return redirect()->route('affiliate.index')->with(['message' => 'Registro exitoso!']);
    }

    public function show(Affiliate $affiliate)
    {
        return view('affiliate.show', [
            'data' => $affiliate,
            'capacity' => $this->capacity($affiliate->id),
        ]);
    }

    public function edit(Affiliate $affiliate)
    {
        $data = $affiliate;
        $civil = Civil::get();
        $municipality = Municipality::get();
        $type = AffiliateType::get();
        return view('affiliate.edit', compact('data', 'civil', 'municipality', 'type'));
    }

    public function update(Affiliate $affiliate, Request $request)
    {
        $affiliate->update($request->all());
        return redirect()->route('affiliate.index')->with(['message' => 'Registro actualizado']);
    }
}
