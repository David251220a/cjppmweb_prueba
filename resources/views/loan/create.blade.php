@extends('layouts.app')

@section('title', 'Editar prestamos')

@section('main')
<form action="{{ route('loan.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="name">Nombre</label>
        <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="exp">Exp Global</label>
        <input type="text" name="exp" id="exp" class="block border rounded px-4 py-2 w-full focus:outline-none">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="exp_active">Exp. Activo</label>
        <input type="text" name="exp_active" id="exp_active" class="block border rounded px-4 py-2 w-full focus:outline-none">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="exp_passive">Exp. Pasivo</label>
        <input type="text" name="exp_passive" id="exp_passive" class="block border rounded px-4 py-2 w-full focus:outline-none">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="active">Activo</label>
        <select name="active" id="active" class="block border rounded px-4 py-2 w-full focus:outline-none">
            <option value="1">SI</option>
            <option value="0">NO</option>
        </select>
    </div>
    <button class="bg-primary font-semibold text-white rounded px-4 py-3" type="submit">Guardar</button>
</form>
@endsection
