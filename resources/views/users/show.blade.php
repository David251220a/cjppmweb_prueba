@extends('layouts.app')

@section('title', 'Perfil usuarios')

@section('main')
<div class="mb-10">
    <div class="grid grid-cols-4 gap-4">
        <div>
            <span class="block font-bold mb-1">Usuario</span>
            <span>{{ $data->username }}</span>
        </div>
        <div>
            <span class="block font-bold mb-1">Nombre</span>
            <span>{{ $data->name }}</span>
        </div>
        <div>
            <span class="block font-bold mb-1">Apellido</span>
            <span>{{ $data->lastname }}</span>
        </div>
        <div>
            <span class="block font-bold mb-1">Creado</span>
            <span>{{ $data->created_at }}</span>
        </div>
        <div>
            <span class="block font-bold mb-1">Tipo de Documento</span>
            <span>{{ $data->document_type }}</span>
        </div>
        <div>
            <span class="block font-bold mb-1">Documento Nro</span>
            <span>{{ $data->document_number }}</span>
        </div>
        <div>
            <span class="block font-bold mb-1">Fecha de Nacimiento</span>
            <span>{{ $data->birth }}</span>
        </div>
        <div>
            <span class="block font-bold mb-1">Sexo</span>
            <span>{{ $data->sex }}</span>
        </div>
        <div>
            <span class="block font-bold mb-1">Correo electronico</span>
            <span>{{ $data->email }}</span>
        </div>
        <div>
            <span class="block font-bold mb-1">Correo verificado</span>
            <span>{{ $data->email_verified_at }}</span>
        </div>
        <div>
            <span class="block font-bold mb-1">Telefono</span>
            <span>{{ $data->phone }}</span>
        </div>
        <div>
            <span class="block font-bold mb-1">Telefono verificado</span>
            <span>{{ $data->phone_verified_at }}</span>
        </div>
    </div>
</div>

<h3 class="font-bold text-2xl mb-4">Fotos</h3>
<div class="mb-10">
    <div class="grid grid-cols-3 gap-4">
        <div>
            <img src="{{ Storage::url($data->doc_f) }}" class="border rounded shadow p-1" />
            <span class="block font-bold mt-2">Frontal</span>
        </div>
        <div>
            <img src="{{ Storage::url($data->doc_p) }}" class="border rounded shadow p-1" />
            <span class="block font-bold mt-2">Dorso</span>
        </div>
        <div>
            <img src="{{ Storage::url($data->doc_v) }}" class="border rounded shadow p-1" />
            <span class="block font-bold mt-2">Selfie</span>
        </div>
    </div>
</div>

<h3 class="font-bold text-2xl mb-4">Grupo de usuario</h3>
<div class="mb-10">
    @foreach ($data->roles as $item)
    <div>
        <i class="fas fa-circle text-primary mr-2"></i>
        <span>{{$item->name}}</span>
    </div>
    @endforeach
</div>
@endsection
