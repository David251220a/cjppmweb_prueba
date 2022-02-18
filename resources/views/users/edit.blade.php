@extends('layouts.app')

@section('title', 'Editar usuarios')

@section('main')
<div class="mb-10">
    <form action="{{ route('user.update', $data) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-4 gap-4 mb-4">
            <div class="mb-4">
                <label class="block font-semibold text-gray-500 mb-2" for="username">Usuario</label>
                <input type="text" name="username" id="username" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ $data->username }}">
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-gray-500 mb-2" for="name">Nombre</label>
                <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ $data->name }}">
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-gray-500 mb-2" for="lastname">Apellido</label>
                <input type="text" name="lastname" id="lastname" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ $data->lastname }}">
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-gray-500 mb-2" for="sex">Sexo</label>
                <select name="sex" id="sex" class="block border rounded px-4 py-2 w-full focus:outline-none">
                    <option value=""></option>
                    <option value="F" {{ $data->sex == 'F' ? 'selected' : null }}>Femenino</option>
                    <option value="M" {{ $data->sex == 'M' ? 'selected' : null }}>Masculino</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-gray-500 mb-2" for="document_number">Documento Nro</label>
                <input type="text" name="document_number" id="document_number" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ $data->document_number }}">
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-gray-500 mb-2" for="birth">Fecha de nacimiento</label>
                <input type="date" name="birth" id="birth" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ $data->birth }}">
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-gray-500 mb-2" for="email">Email</label>
                <input type="email" name="email" id="email" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ $data->email }}">
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-gray-500 mb-2" for="phone">Telefono</label>
                <input type="text" name="phone" id="phone" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ $data->phone }}">
            </div>
        </div>
        <button class="bg-primary font-semibold text-white rounded px-4 py-3" type="submit">Guardar</button>
    </form>
</div>

<h3 class="font-bold text-2xl mb-4">Grupo de Usuario</h3>
<div class="mb-10">
    <form action="{{ route('account') }}">
        <input type="hidden" name="user" value="{{ $data->id }}">
        <input type="hidden" name="option" value="role">
        <select name="rol" id="rol" class="block border rounded px-4 py-2 w-full focus:outline-none">
            <option value=""></option>
            @foreach ($role as $item)
            <option value="{{ $item->id }}" {{ $data->hasRole($item->id) ? 'selected' : null }}>{{ $item->name }}</option>
            @endforeach
        </select>
        <button class="bg-primary font-semibold text-white rounded mt-4 px-4 py-3" type="submit">Guardar</button>
    </form>
</div>

<h3 class="font-bold text-2xl mb-4">Estado</h3>
<div class="mb-10">
    <div>
        <strong>Cuenta activada:</strong>
        <span>{{ $data->active ? 'SI' : 'NO' }}</span>
    </div>
    <div>
        <strong>Correo verificado:</strong>
        <span>{{ $data->email_verified_at }}</span>
    </div>
    <div>
        <strong>Telefono verificado:</strong>
        <span>{{ $data->phone_verified_at }}</span>
    </div>
    <div>
        <strong>Documento F:</strong>
        <span>{{ $data->doc_f ? 'SI' : 'NO' }}</span>
    </div>
    <div>
        <strong>Documento P:</strong>
        <span>{{ $data->doc_p ? 'SI' : 'NO' }}</span>
    </div>
    <div>
        <strong>Documento V:</strong>
        <span>{{ $data->doc_v ? 'SI' : 'NO' }}</span>
    </div>
</div>

<h3 class="font-bold text-2xl mb-6">Opciones</h3>
<div class="mb-10">
    <a class="bg-primary font-semibold text-white rounded px-4 py-3" href="{{ route('account', ['user'=> $data->id, 'option' => 'activate']) }}">Activar cuenta</a>
    <a class="bg-primary font-semibold text-white rounded px-4 py-3" href="{{ route('account', ['user'=> $data->id, 'option' => 'email']) }}">Ignorar correo</a>
    <a class="bg-primary font-semibold text-white rounded px-4 py-3" href="{{ route('account', ['user'=> $data->id, 'option' => 'phone']) }}">Ignorar telefono</a>
    <a class="bg-primary font-semibold text-white rounded px-4 py-3" href="{{ route('account', ['user'=> $data->id, 'option' => 'password']) }}">Resetear contraseña</a>
</div>
@endsection
