@extends('layouts.app')

@section('title', 'Agregar municipalidad')

@section('main')
<form action="{{ route('municipality.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="name">Nombre</label>
        <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ old('name') }}">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="cobol">Cobol ID</label>
        <input type="text" name="cobol" id="cobol" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ old('cobol') }}">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="departamento">Departamento ID</label>
        <input type="text" name="departamento" id="departamento" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ old('departamento') }}">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="name">Instituto ID</label>
        <input type="text" name="instituto" id="instituto" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ old('instituto') }}">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="benefit">Beneficio</label>
        <select name="benefit" id="benefit" class="block border rounded px-4 py-2 w-full focus:outline-none">
            <option value="1">SI</option>
            <option value="1">NO</option>
        </select>
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="active">Activo</label>
        <select name="active" id="active" class="block border rounded px-4 py-2 w-full focus:outline-none">
            <option value="1">SI</option>
            <option value="1">NO</option>
        </select>
    </div>
    <button class="bg-primary font-semibold text-white rounded px-4 py-3" type="submit">Guardar</button>
</form>
@endsection
