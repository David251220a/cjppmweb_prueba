<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role.index')->only('index');
        $this->middleware('permission:role.create')->only('create');
        $this->middleware('permission:role.create')->only('store');
        $this->middleware('permission:role.edit')->only('edit');
        $this->middleware('permission:role.edit')->only('update');
    }

    public function index(Request $request)
    {
        if ($request->search) {
            $data = Municipality::where('name', 'LIKE', '%' . $request->search . '%')->orderBy('name')->paginate(50);
        } else {
            $data = Municipality::orderBy('name')->paginate(50);
        }
        return view('municipality.index', compact('data'));
    }

    public function create()
    {
        return view('municipality.create');
    }

    public function store(Request $request)
    {
        Municipality::create($request->all());
        return redirect()->route('municipality.index')->with(['message' => 'Registro exitoso!']);
    }

    public function edit(Municipality $municipality)
    {
        return view('municipality.edit', [
            'data' => $municipality
        ]);
    }

    public function update(Request $request, Municipality $municipality)
    {
        $municipality->update($request->all());
        return redirect()->route('municipality.index')->with(['message' => 'Registro exitoso!']);
    }
}
