@extends('layouts.app')

@section('title', 'Ley 5189 - ' . $data->name)

@section('options')
@can('ley5189.create')
<a href="{{ route('ley5189.create', ['id'=> $data->id]) }}" class="bg-primary font-semibold text-white text-sm rounded px-4 py-2">Agregar</a>
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
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Periodo</th>
                            <th scope="col" class="relative px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($data->items as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">{{ $item->year }} - {{ $month[$item->month] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                @can('ley5189.edit')
                                <a class="ml-2" href="{{ route('ley5189.edit', $item) }}"><i class="fas fa-pencil-alt"></i></a>
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
