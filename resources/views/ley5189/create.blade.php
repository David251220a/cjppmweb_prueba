@extends('layouts.app')

@section('title', 'Agregar documento a ' . $data->name)

@section('main')
<form action="{{ route('ley5189.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="year">Año</label>
        <select name="year" id="year" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
            <option value="2021">2021</option>
            <option value="2020">2020</option>
            <option value="2020">2019</option>
        </select>
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="month">Mes</label>
        <select name="month" id="month" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
            <option value="1">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agosto</option>
            <option value="9">Setiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="file">Archivo</label>
        <input type="file" name="file" id="file" class="block bg-white border rounded px-4 py-2 w-full focus:outline-none" required>
    </div>
    <input type="hidden" name="document_id" value="{{ request()->id }}">
    <button class="bg-primary font-semibold text-white rounded px-4 py-3" type="submit">Guardar</button>
</form>
@endsection
