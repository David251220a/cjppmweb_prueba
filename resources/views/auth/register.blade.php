@extends('layouts.auth')

@section('title', 'CREAR CLAVE DE ACCESO')

@section('main')
<form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="name">Nombre</label>
        <input type="text" name="name" id="name" class="block border rounded px-4 py-3 w-full" value="{{ old('name') }}" required />
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="lastname">Apellido</label>
        <input type="text" name="lastname" id="lastname" class="block border rounded px-4 py-3 w-full" value="{{ old('lastname') }}" required />
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="document">Nro de Documento</label>
        <input type="tel" name="document" id="document" class="block border rounded px-4 py-3 w-full" value="{{ old('document') }}" required />
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="birthday">Fecha de nacimiento</label>
        <input type="date" name="birthday" id="birthday" class="block border rounded px-4 py-3 w-full" value="{{ old('birthday') }}" required />
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="name">Sexo</label>
        <select name="sex" id="sex" class="block border rounded px-4 py-3 w-full" required>
            <option value=""></option>
            <option value="F">Femenino</option>
            <option value="M">Masculino</option>
        </select>
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="name">Correo Electronico</label>
        <input type="email" name="email" id="email" class="block border rounded px-4 py-3 w-full" value="{{ old('email') }}" required />
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="name">Telefono</label>
        <input type="text" name="phone" id="phone" class="block border rounded px-4 py-3 w-full" value="{{ old('phone') }}" required />
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="name">Contraseña</label>
        <input type="password" name="password" id="password" class="block border rounded px-4 py-3 w-full" value="{{ old('password') }}" required />
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="doc_f">Documento de Identidad (Frontal)</label>
        <input type="file" name="doc_f" id="doc_f" class="block border rounded px-4 py-3 w-full" required />
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="doc_p">Documento de Identidad (Posterior)</label>
        <input type="file" name="doc_p" id="doc_p" class="block border rounded px-4 py-3 w-full" required />
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="doc_v">Selfie c/ Documento de Identidad</label>
        <input type="file" name="doc_v" id="doc_v" class="block border rounded px-4 py-3 w-full" required />
    </div>
    <div>
        <button type="submit" class="block bg-primary font-semibold text-white text-center uppercase rounded shadow px-4 py-3 w-full">Solicitar clave</button>
    </div>
</form>
<a class="block border border-primary font-semibold text-primary text-center uppercase rounded shadow mt-4 px-4 py-3 w-full" href="{{ route('login') }}">Cancelar</a>
@endsection
