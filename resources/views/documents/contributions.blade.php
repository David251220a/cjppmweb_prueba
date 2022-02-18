<div style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 12px">
    <div>
        <img height="50" src="{{ public_path('assets/logo.png') }}">
        <hr>
        <h1 style="font-weight: bold; font-size: 15px; text-align: center;">Extracto de Aportes de Afiliados</h1>
        <hr>
        <div style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px;">
            <p><strong>Documento:</strong> {{ Auth::user()->affiliate->document_number }}</p>
            <p><strong>Legajo:</strong> {{ Auth::user()->affiliate->folder_id }}</p>
            <p><strong>Nombre y Apellido:</strong> {{ Auth::user()->affiliate->name }} {{ Auth::user()->affiliate->lastname }}</p>
            <p><strong>Institución:</strong> {{ Auth::user()->affiliate->municipality->name }}</p>
            <p><strong>Antiguedad:</strong> {{ $contributions[0]->antiguedad_año_consolidado }} años y {{ $contributions[0]->antiguedad_mes_consolidado }} meses</p>
        </div>

    </div>
    <table style="width: 100%">
        <thead style="border-top: 1px solid #333;border-bottom: 1px solid #333; font-weight: bold">
            <tr>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right; width: 15%">Fecha Aporte</td>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right; width: 15%">Aporte Personal</td>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right; width: 15%">Primera Asig.</td>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right; width: 15%">Diferencia Asig.</td>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right; width: 15%">RSA</td>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right; width: 25%">Institucion Municipal</td>
            </tr>
        </thead>
        <tbody>
            @php
            $aporte_personal = 0;
            $primera_asignacion = 0;
            $diferencia_asignacion = 0;
            $rsa = 0;
            @endphp
            @foreach ($contributions as $item)
            @php
            $aporte_personal = $aporte_personal + $item->aporte_personal;
            $primera_asignacion = $primera_asignacion + $item->primera_asignacion;
            $diferencia_asignacion = $diferencia_asignacion + $item->diferencia_asignacion;
            $rsa = $rsa + $item->rsa;

            @endphp
            <tr>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right">{{ date('d-m-Y', StrToTime($item->fecha_aporte)) }}</td>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right">{{ number_format($item->aporte_personal, 0,'.', '.') }} Gs.</td>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right">{{ number_format($item->primera_asignacion, 0,'.', '.') }} Gs.</td>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right">{{ number_format($item->diferencia_asignacion, 0,'.', '.') }} Gs.</td>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right">{{ number_format($item->rsa, 0,'.', '.') }} Gs.</td>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right">{{ $item->id_institucion_municipal == -1 ? '' : $municipality["a".trim($item->id_institucion_municipal)] }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot style="border-top: 1px solid #333;border-bottom: 1px solid #333; font-weight: bold">
            <tr>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right">Totales:</td>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right">{{ number_format($aporte_personal, 0,'.', '.') }} Gs.</td>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right">{{ number_format($primera_asignacion, 0,'.', '.') }} Gs.</td>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right">{{ number_format($diferencia_asignacion, 0,'.', '.') }} Gs.</td>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right">{{ number_format($rsa, 0,'.', '.') }} Gs.</td>
                <td style="padding-left: 4px; padding-right: 4px; padding-top: 8px; padding-bottom: 5px; text-align: right"></td>
            </tr>
        </tfoot>
    </table>
    <div style="padding-left: 4px; padding-right: 4px; padding-top: 15px; line-height: 18px; text-align: justify"><strong>Total de Aportes Gs: {{ number_format($aporte_personal + $primera_asignacion + $diferencia_asignacion + $rsa, 0,'.', '.') }}</strong></div>
    <div style="padding-left: 4px; padding-right: 4px; padding-top: 15px; line-height: 18px; text-align: justify"></div>
    <div style="padding-left: 4px; padding-right: 4px; padding-top: 15px; padding-bottom: 5px; line-height: 18px; text-align: justify"><strong>SEÑOR AFILIADO:</strong> Este documento fue generado el {{ date('d-m-Y H:i:s') }} desde la CJPPM Virtual por el usuario {{ Auth::user()->username }} [{{ Auth::user()->name }} {{ Auth::user()->lastname }}]. Los aportes detallados corresponden al Planilla de Aportes de Fecha 00/00/0000 remitida por esa Institucion a la Caja. Con el proposito de brindarle un mejor servicio, emitimos este EXTRACTO DE APORTES, rogandole consultarnos cualquier duda al respecto, en la Oficina de la Caja.</div>
</div>
