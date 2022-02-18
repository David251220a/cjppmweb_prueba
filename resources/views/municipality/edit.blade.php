@extends('layouts.app')

@section('title', 'Editar municipalidad')

@section('main')
<form action="{{ route('municipality.update', $data) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="name">Nombre</label>
        <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ $data->name }}">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="cobol">Cobol ID</label>
        <input type="text" name="cobol" id="cobol" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ $data->cobol }}">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="departamento">Departamento ID</label>
        <input type="text" name="departamento" id="departamento" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ $data->departamento }}">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="instituto">Instituto ID</label>
        <input type="text" name="instituto" id="instituto" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ $data->instituto }}">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="benefit">Beneficio</label>
        <select name="benefit" id="benefit" class="block border rounded px-4 py-2 w-full focus:outline-none">
            <option value="1" {{ $data->benefit == 1 ? 'selected' : null}}>SI</option>
            <option value="0" {{ $data->benefit == 0 ? 'selected' : null}}>NO</option>
        </select>
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="active">Activo</label>
        <select name="active" id="active" class="block border rounded px-4 py-2 w-full focus:outline-none">
            <option value="1" {{ $data->active == 1 ? 'selected' : null}}>SI</option>
            <option value="0" {{ $data->active == 0 ? 'selected' : null}}>NO</option>
        </select>
    </div>
    <button class="bg-primary font-semibold text-white rounded px-4 py-3" type="submit">Guardar</button>
</form>
@endsection
