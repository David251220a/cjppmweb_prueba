<?php

namespace App\Http\Controllers;

use App\Models\Ley5189;
use App\Models\Ley5189Items;
use Illuminate\Http\Request;

class Ley5189Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:ley5189.index')->only('index');
        $this->middleware('permission:ley5189.create')->only('create');
        $this->middleware('permission:ley5189.create')->only('store');
        $this->middleware('permission:ley5189.show')->only('show');
        $this->middleware('permission:ley5189.edit')->only('edit');
        $this->middleware('permission:ley5189.edit')->only('update');
        $this->middleware('permission:ley5189.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
        $data = Ley5189::orderBy('name')->get();
        return view('ley5189.index', compact('data'));
    }

    public function create(Request $request)
    {
        $data = Ley5189::find($request->id);
        if ($data) {
            return view('ley5189.create', compact('data'));
        }
        return redirect()->route('ley5189.index')->withErrors('Ha ocurrido un error.');
    }

    public function store(Request $request)
    {
        $valid = Ley5189Items::where('year', $request->year)->where('month', $request->month)->where('document_id', $request->document_id)->first();
        if (!empty($valid)) {
            return redirect()->route('ley5189.show', $request->document_id)->withErrors('Ya existe un archivo para el periodo indicado');
        }
        $filePath = $request->file('file')->store('ley5189');
        $data = $request->all();
        $data['file'] = $filePath;
        Ley5189Items::create($data);
        return redirect()->route('ley5189.show', $request->document_id)->with('message', 'Registro actualizado.');
    }

    public function show(Ley5189 $ley5189)
    {
        $month = $this->month();
        return view('ley5189.show', [
            'data' => $ley5189,
            'month' => $month
        ]);
    }

    public function edit(Ley5189Items $ley5189)
    {
        return view('ley5189.edit', [
            'data' => $ley5189
        ]);
    }

    public function update(Request $request)
    {
        $valid = Ley5189Items::where('year', $request->year)->where('month', $request->month)->where('document_id', $request->document_id)->where('id', '!=', $request->id)->first();
        if (!empty($valid)) {
            return redirect()->route('ley5189.show', $request->document_id)->withErrors('Ya existe un archivo para el periodo indicado');
        }
        $filePath = $request->file('file')->store('ley5189');
        $data = $request->all();
        $data['file'] = $filePath;
        Ley5189Items::find($request->id)->update($data);
        return redirect()->route('ley5189.show', $request->document_id)->with('message', 'Registro actualizado.');
    }
}
