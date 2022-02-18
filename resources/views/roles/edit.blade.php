@extends('layouts.app')

@section('title', 'Editar grupo')

@section('main')
<form action="{{ route('role.update', $data) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="name">Grupo ID</label>
        <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" value="{{ $data->name }}">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2 w-full">Permisos</label>
        <div class="grid grid-cols-4 mb-4">
            @foreach ($permissions as $item)
            <label><input type="checkbox" name="permissions[]" id="permissions" value="{{ $item['id'] }}" {{ $data->hasPermissionTo($item['id']) ? 'checked' : null }}> {{$item->name}}</label>
            @endforeach
        </div>
    </div>
    <button class="bg-primary font-semibold text-white rounded px-4 py-3" type="submit">Guardar</button>
</form>
@endsection
