@extends('layouts.app')

@section('title', 'Crear usuarios')

@section('main')
<form action="{{ route('user.store') }}" method="POST">
    @csrf
    <div class="grid grid-cols-4 gap-4 mb-4">
        <div class="mb-4">
            <label class="block font-semibold text-gray-500 mb-2" for="username">Usuario</label>
            <input type="text" name="username" id="username" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ old('username') }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Nombre</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ old('name') }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-gray-500 mb-2" for="lastname">Apellido</label>
            <input type="text" name="lastname" id="lastname" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ old('lastname') }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-gray-500 mb-2" for="sex">Sexo</label>
            <select name="sex" id="sex" class="block border rounded px-4 py-2 w-full focus:outline-none">
                <option value=""></option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-gray-500 mb-2" for="document_number">Documento Nro</label>
            <input type="text" name="document_number" id="document_number" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ old('document_number') }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-gray-500 mb-2" for="birth">Fecha de nacimiento</label>
            <input type="date" name="birth" id="birth" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ old('birth') }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-gray-500 mb-2" for="email">Email</label>
            <input type="email" name="email" id="email" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ old('email') }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-gray-500 mb-2" for="phone">Telefono</label>
            <input type="text" name="phone" id="phone" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ old('phone') }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-gray-500 mb-2" for="password">Contraseña</label>
            <input type="text" name="password" id="password" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ old('password') }}">
        </div>
        <div class="mb-4">
            <label class="block font-semibold text-gray-500 mb-2" for="active">Verificado</label>
            <select name="active" id="active" class="block border rounded px-4 py-2 w-full focus:outline-none">
                <option value="1">SI</option>
                <option value="0">NO</option>
            </select>
        </div>
    </div>
    <button class="bg-primary font-semibold text-white rounded px-4 py-3" type="submit">Guardar</button>
</form>
@endsection
