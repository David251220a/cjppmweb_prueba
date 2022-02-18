@extends('layouts.app')

@section('title', 'Préstamos')

@section('options')
@if (count($loan) > 0 )
<a href="{{ route('prestamos.solicitar') }}" class="bg-primary font-semibold text-white text-sm rounded px-4 py-2"><i class="fas fa-plus mr-2"></i> Solicitar un Prestamo</a>
@endif
@endsection

@section('main')
<table class="min-w-full divide-y divide-gray-200 rounded overflow-hidden shadow">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Secuencia</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cuota / Plazo</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto Prestamo</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto cuota</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Ult/Generacion</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Saldo Actual</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Linea</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dependencia</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @php
        $Monto_Prestamo = 0;
        $Monto_Cuota = 0;
        $Monto_Amortizacion_Total_SaldoActual = 0;
        @endphp
        @foreach ($data as $item)
        @php
        $Monto_Prestamo = $Monto_Prestamo + $item->Monto_Prestamo;
        $Monto_Cuota = $Monto_Cuota + $item->Monto_Cuota;
        $Monto_Amortizacion_Total_SaldoActual = $Monto_Amortizacion_Total_SaldoActual + $item->Monto_Amortizacion_Total_SaldoActual;
        @endphp
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->Secuencia }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->Cuota_Cobro_Ultimo }} / {{ $item->Plazo }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->Monto_Prestamo, 0,'.', '.') }} Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->Monto_Cuota, 0,'.', '.') }} Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->Cuota_Fecha_Generacion_Ultima }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->Monto_Amortizacion_Total_SaldoActual, 0,'.', '.') }} Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->Desc_Producto }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->Id_Dependencia }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot class="bg-gray-100">
        <tr>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider"></th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider"></th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider">{{ number_format($Monto_Prestamo, 0,'.', '.') }} Gs</th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider">{{ number_format($Monto_Cuota, 0,'.', '.') }} Gs</th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider"></th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider">{{ number_format($Monto_Amortizacion_Total_SaldoActual, 0,'.', '.') }} Gs</th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider"></th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider"></th>
        </tr>
    </tfoot>
</table>

@if ($data2)
<p class="font-bold text-dark text-xl uppercase mt-6 mb-4">Morosidad</p>
<table class="min-w-full divide-y divide-gray-200 rounded overflow-hidden shadow">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto Cuota Saldo</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto Interes Saldo</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto Capital Saldo</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto Int. Punitorio Saldo</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto Int. Punitorio Congelado Saldo</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto Seguro Saldo</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto IVA</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total General</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($data2 as $item)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->Monto_Total_Cuota_Saldo, 0,'.', '.') }} Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->Monto_Total_Cuota_Interes_Saldo, 0,'.', '.') }} Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->Monto_Total_Cuota_Amortizacion_Saldo, 0,'.', '.') }} Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->Monto_Total_Cuota_Interes_Punitorio_Saldo, 0,'.', '.') }} Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->Monto_Total_Cuota_Interes_Punitorio_Congelado, 0,'.', '.') }} Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->Monto_Total_Cuota_Seguro_Saldo, 0,'.', '.') }} Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->Monto_Total_IVA, 0,'.', '.') }} Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format(($item->Monto_Total_Cuota_Saldo+$item->Monto_Total_Cuota_Interes_Punitorio_Saldo+$item->Monto_Total_Cuota_Interes_Punitorio_Congelado+$item->Monto_Total_Cuota_Seguro_Saldo+$item->Monto_Total_IVA), 0,'.', '.') }} Gs.</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@if ($data3)
<p class="font-bold text-dark text-xl uppercase mt-6 mb-4">Solicitudes</p>

<table class="min-w-full divide-y divide-gray-200 rounded overflow-hidden shadow">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Expediente</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prestamo</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($data3 as $item)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->loan->exp }}{{ $item->passive == '1' ? $item->loan->exp_passive : $item->loan->exp_active }}{{ 100000 + $item->number }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->loan->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">{{ number_format($item->amount,0,',','.') }} Gs</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->status->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@endsection
