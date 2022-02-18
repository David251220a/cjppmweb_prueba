@extends('layouts.app')

@section('title', 'Perfil afiliados')

@section('main')
<div class="bg-white rounded overflow-hidden shadow mb-4">
    <div class="bg-gray-200 font-semibold px-4 py-2">Datos del Afiliado</div>
    <div class="grid md:grid-cols-12 gap-4 px-4 py-6">
        <div class="md:col-span-2">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Legajo ID</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="{{ $data->folder_id }}">
        </div>
        <div class="md:col-span-4">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Nombre</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="{{ $data->name }}">
        </div>
        <div class="md:col-span-4">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Apellido</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="{{ $data->lastname }}">
        </div>
        <div class="md:col-span-2">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Categoría</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="{{ $data->type->name }}">
        </div>
        <div class="md:col-span-2">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Documento</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="{{ $data->document_type }}">
        </div>
        <div class="md:col-span-2">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Documento Nro</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="{{ $data->document_number }}">
        </div>
        <div class="md:col-span-2">
            <label class="block font-semibold text-gray-500 mb-2" for="name">F. Nac</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="{{ $data->birthday }}">
        </div>
        <div class="md:col-span-3">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Estado Civil</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="{{ $data->civil_id }}">
        </div>
        <div class="md:col-span-3">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Sexo</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="{{ $data->sex }}">
        </div>
    </div>
</div>

{{-- CAPACIDAD DE PAGO --}}
<div class="bg-white rounded overflow-hidden shadow mb-4">
    <div class="bg-gray-200 font-semibold px-4 py-2">Capacidad de Pago</div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aporte</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prestamos</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Morosidad</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Disponibilidad</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ number_format($capacity['available'], 0,'','.') }} Gs</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ number_format($capacity['loan'], 0,'','.') }} Gs</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ number_format($capacity['loan_defaulter'], 0,'','.') }} Gs</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ number_format($capacity['available'] - ($capacity['loan'] + $capacity['loan_defaulter']), 0,'','.') }} Gs</td>
            </tr>
        </tbody>
    </table>
</div>

@if ($data->user)
<div class="bg-white rounded overflow-hidden shadow mb-4">
    <div class="bg-gray-200 font-semibold px-4 py-2">Portal de Autogestion</div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Verificado</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telefono</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Verificado</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">F Nac.</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CI F</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CI P</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CI V</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alta</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->user->username}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->user->name}} {{$data->user->lastname}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->user->email}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->user->email_verified_at ? 'SI' : 'NO'}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->user->phone}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->user->phone_verified_at ? 'SI' : 'NO'}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->user->birth}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->user->doc_f ? 1 : 0}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->user->doc_p ? 1 : 0}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->user->doc_v ? 1 : 0}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$data->user->created_at->format('d-m-Y H:i:s')}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endif
@endsection
