@extends('layouts.app')

@section('title', $data->name)
@section('search', true)

@section('options')
@can('loan.request.create')
<a href="{{ route('lrequest.create', ['loan' => $data]) }}" class="bg-primary font-semibold text-white text-sm rounded px-4 py-2">Agregar</a>
@endcan
@endsection

@section('main')
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Exp</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Documento</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th scope="col" class="relative px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($request as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->loan->exp }}{{ $item->passive == '1' ? $data->exp_passive : $data->exp_active }}{{ 100000 + $item->number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->affiliate->document_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->affiliate->name }} {{ $item->affiliate->lastname }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->amount,0,',','.') }} Gs</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->status->name }}</td>
                            <td class="flex gap-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                @can('loan.request.show')
                                <a class="ml-2" href="{{ route('lrequest.show', ['loan' => $data, 'lrequest' => $item]) }}"><i class="fas fa-eye"></i></a>
                                @endcan
                                @can('loan.request.status')
                                <a class="ml-2" href="{{ route('lrequest.status', ['loan' => $data, 'lrequest' => $item]) }}"><i class="fas fa-bars"></i></a>
                                @endcan
                                @can('loan.request.edit')
                                <a class="ml-2" href="{{ route('lrequest.edit', ['loan' => $data, 'lrequest' => $item]) }}"><i class="fas fa-pencil-alt"></i></a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
