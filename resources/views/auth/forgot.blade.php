@extends('layouts.auth')

@section('title', 'Portal de autogestión')

@section('main')
<form action="{{route('forgot')}}" method="POST">
    @csrf
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="document">Nro de Documento</label>
        <input type="tel" name="document" id="document" class="block border rounded px-4 py-3 w-full" value="{{ old('document') }}" required />
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="birthday">Fecha de nacimiento</label>
        <input type="date" name="birthday" id="birthday" class="block border rounded px-4 py-3 w-full" value="{{ old('birthday') }}" required />
    </div>
    <div>
        <button type="submit" class="block bg-primary font-semibold text-white text-center uppercase rounded shadow px-4 py-3 w-full">Restablecer contraseña</button>
    </div>
</form>
<a class="block border border-primary font-semibold text-primary text-center uppercase rounded shadow mt-4 px-4 py-3 w-full" href="{{ route('login') }}">Cancelar</a>
@endsection
