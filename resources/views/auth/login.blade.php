@extends('layouts.auth')

@section('title', 'Portal de autogestión')

@section('main')
<form action="{{route('login')}}" method="POST">
    @csrf
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="username">Nro de Documento</label>
        <input type="text" name="username" id="username" class="block border rounded px-4 py-3 w-full" value="{{ old('username') }}" required />
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="password">Contraseña</label>
        <input type="password" name="password" id="password" class="block border rounded px-4 py-3 w-full" value="{{ old('password') }}" required />
    </div>
    <div>
        <button type="submit" class="block bg-primary font-semibold text-white text-center uppercase rounded shadow px-4 py-3 w-full">Iniciar sesión</button>
    </div>
</form>
<a class="block border border-primary font-semibold text-primary text-center uppercase rounded shadow mt-4 px-4 py-3 w-full" href="{{ route('forgot') }}">Olvidaste tu contraseña?</a>
@endsection

@section('footer')
<a class="block font-semibold text-white text-center uppercase rounded mt-6 mx-auto" href="{{ route('register') }}">Solicitar clave de acceso</a>
@endsection
