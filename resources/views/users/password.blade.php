@extends('layouts.app')

@section('title', 'Cambiar contraseña')

@section('main')
<form action="{{ route('password') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="password">Contraseña Actual</label>
        <input type="password" name="password" id="password" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ old('password') }}">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="newpassword">Nueva contraseña</label>
        <input type="password" name="newpassword" id="newpassword" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ old('newpassword') }}">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="repassword">Repetir la nueva contraseña</label>
        <input type="password" name="repassword" id="repassword" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ old('repassword') }}">
    </div>
    <button class="bg-primary font-semibold text-white rounded px-4 py-3" type="submit">Cambiar contraseña</button>
</form>
@endsection
