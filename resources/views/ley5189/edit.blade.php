@extends('layouts.app')

@section('title', 'Editar documento ' . $data->document->name)

@section('main')
<form action="{{ route('ley5189.update', $data) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="year">Año</label>
        <select name="year" id="year" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
            <option {{ $data->year == '2021' ? 'selected' : null }} value="2021">2021</option>
            <option {{ $data->year == '2020' ? 'selected' : null }} value="2020">2020</option>
            <option {{ $data->year == '2019' ? 'selected' : null }} value="2019">2019</option>
        </select>
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="month">Mes</label>
        <select name="month" id="month" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
            <option {{ $data->month == '1' ? 'selected' : null }} value="1">Enero</option>
            <option {{ $data->month == '2' ? 'selected' : null }} value="2">Febrero</option>
            <option {{ $data->month == '3' ? 'selected' : null }} value="3">Marzo</option>
            <option {{ $data->month == '4' ? 'selected' : null }} value="4">Abril</option>
            <option {{ $data->month == '5' ? 'selected' : null }} value="5">Mayo</option>
            <option {{ $data->month == '6' ? 'selected' : null }} value="6">Junio</option>
            <option {{ $data->month == '7' ? 'selected' : null }} value="7">Julio</option>
            <option {{ $data->month == '8' ? 'selected' : null }} value="8">Agosto</option>
            <option {{ $data->month == '9' ? 'selected' : null }} value="9">Setiembre</option>
            <option {{ $data->month == '10' ? 'selected' : null }} value="10">Octubre</option>
            <option {{ $data->month == '11' ? 'selected' : null }} value="11">Noviembre</option>
            <option {{ $data->month == '12' ? 'selected' : null }} value="12">Diciembre</option>
        </select>
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="file">Archivo</label>
        <input type="file" name="file" id="file" class="block bg-white border rounded px-4 py-2 w-full focus:outline-none" required>
    </div>
    <input type="hidden" name="document_id" value="{{ $data->document->id }}">
    <input type="hidden" name="id" value="{{ $data->id }}">
    <button class="bg-primary font-semibold text-white rounded px-4 py-3" type="submit">Guardar</button>
</form>
@endsection
