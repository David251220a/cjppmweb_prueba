@extends('layouts.app')

@php
$meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
@endphp

@section('title', 'Aportes')

@section('main')
<table class="min-w-full divide-y divide-gray-200 rounded overflow-hidden shadow">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Periodo</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Salario</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ap. Pers.</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ap. Asig.</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dif. Asig.</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">R.S.A.</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @php
        $Aporte_Personal = 0;
        $Primera_Asignacion = 0;
        $Diferencia_Asignacion = 0;
        $RSA = 0;
        @endphp
        @foreach ($data as $item)
        @php
        $Aporte_Personal = $Aporte_Personal + $item->Aporte_Personal;
        $Primera_Asignacion = $Primera_Asignacion + $item->Primera_Asignacion;
        $Diferencia_Asignacion = $Diferencia_Asignacion + $item->Diferencia_Asignacion;
        $RSA = $RSA + $item->RSA;
        @endphp
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase">
                @if ($item->Id_InstitucionMunicipal == -1)
                Periodos Anteriores
                @else
                {{ date('Y', StrToTime($item->Fecha_Aporte)) }} {{ $meses[intval(date('m', StrToTime($item->Fecha_Aporte ))) - 1] }}
                @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->Aporte_Personal * 10, 0,'.', '.') }} Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->Aporte_Personal, 0,'.', '.') }} Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->Primera_Asignacion, 0,'.', '.') }} Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->Diferencia_Asignacion, 0,'.', '.') }} Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->RSA, 0,'.', '.') }} Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->Aporte_Personal + $item->Primera_Asignacion + $item->Diferencia_Asignacion + $item->RSA, 0,'.', '.') }} Gs.</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot class="bg-gray-100">
        <tr>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider"></th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider">{{ number_format($Aporte_Personal * 10, 0,'.', '.') }} Gs</th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider">{{ number_format($Aporte_Personal, 0,'.', '.') }} Gs</th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider">{{ number_format($Primera_Asignacion, 0,'.', '.') }} Gs</th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider">{{ number_format($Diferencia_Asignacion, 0,'.', '.') }} Gs</th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider">{{ number_format($RSA, 0,'.', '.') }} Gs</th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider">{{ number_format($Aporte_Personal + $Primera_Asignacion + $Diferencia_Asignacion + $RSA, 0,'.', '.') }} Gs</th>
        </tr>
    </tfoot>
</table>

@endsection
