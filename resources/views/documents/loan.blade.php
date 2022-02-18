@php
$meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
@endphp
<div style="font-family: Arial, Helvetica, sans-serif; font-size:13px; line-height:24px;">
    <style>
        .text {
            color: #000000;
            font-weight: bold;
        }

        .title {
            background: #e3ffe9;
            border: 1px solid #009c48;
            color: #009c48;
            font-size: 14px;
            font-weight: bold;
            line-height: 16px;
            margin: 10px 0;
            padding: 8px;
            text-align: left;
            text-transform: uppercase;
        }

        .table {
            border-collapse: collapse;
            font-size: 12px;
            line-height: 12px;
            width: 100%
        }

        .table tbody {
            font-weight: bold;
        }

        .table td {
            border: 1px solid #666666;
            padding: 5px 10px;
        }

    </style>
    <!-- SOLICITUD DE CREDITO -->
    <div>
        <table style="margin-bottom: 16px; width: 100%">
            <tr>
                <td>
                    <img src="{{ asset('storage/logo.png') }}" height="50" />
                </td>
                <td style="text-transform: uppercase; text-align:right">
                    <p style="font-size:14px; font-weight: bold; line-height: 14px;">EXP. NRO. {{ $data->loan->exp . ($data->passive ? $data->loan->exp_passive : $data->loan->exp_active) . (100000 + $data['number']) }}</p>
                    <h3 style="font-size:16px; line-height: 16px;">Solicitud de Prestamo</h3>
                </td>
            </tr>
        </table>
        <div class="title">Datos personales del Solicitante </div>
        <table class="table">
            <thead>
                <tr>
                    <td>Apellido(s) y Nombre(s)</td>
                    <td>Fecha de Nac.</td>
                    <td>Nro y Tipo de Documento</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data->affiliate->name }} {{ $data->affiliate->lastname }}</td>
                    <td>{{ date('d/m/Y', strtotime($data->affiliate->birthday )) }}</td>
                    <td>{{ $data->affiliate->document_number }} (CIP)</td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <thead>
                <tr>
                    <td>Estado Civil</td>
                    <td>Domicilio</td>
                    <td>Localidad</td>
                    <td>Barrjo</td>
                    <td>Telefono</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>-</td>
                    <td>{{ $data->affiliate->address[0]['address'] }}</td>
                    <td>{{ $data->affiliate->address[0]['city'] }}</td>
                    <td>{{ $data->affiliate->address[0]['neighborhood'] }}</td>
                    <td>{{ @$data->affiliate->user->phone }}</td>
                </tr>
            </tbody>
        </table>
        <div class="title">Datos laborales del solicitante</div>
        <table class="table">
            <thead>
                <tr>
                    <td>Lugar de trabajo</td>
                    <td>Renumeracion Gs.</td>
                    <td>Cargo</td>
                    <td>Dependencia</td>
                    <td>Telefono</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data->affiliate->municipality->name }}</td>
                    <td>{{ number_format($data->affiliate->job[0]->salary, 0, '.', '.') }}</td>
                    <td>{{ $data->affiliate->job[0]->position }}</td>
                    <td>{{ $data->affiliate->job[0]->dependence }}</td>
                    <td>{{ $data->affiliate->job[0]->phone }}</td>
                </tr>
            </tbody>
        </table>

        <div class="title">Prestamo solicitado</div>
        <table class="table">
            <thead>
                <tr>
                    <td>Monto Solicitado Gs.</td>
                    <td>Plazo del Prestamo (Meses)</td>
                    <td>Destino o Aplicacion del Prestamo</td>
                    <td>Ya obtuvo prestamo de la caja?</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ number_format($data->amount, 0, '.', '.') }}</td>
                    <td>{{ $data->time }}</td>
                    <td>{{ $data->loan->name }}</td>
                    <td>{{ $data->previous == 1 ? 'SI' : 'NO' }}</td>
                </tr>
            </tbody>
        </table>

        <div class="title">Referencias personales</div>
        <table class="table">
            <thead>
                <tr>
                    <td>Apellido(s) y Nombre(s)</td>
                    <td>Direccion</td>
                    <td>Telefono</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->affiliate->reference as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->phone }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="title">Documento que acompaña marcar con X</div>
        <table class="table">
            <tbody>
                <tr>
                    <td>[__] Fotocopia de Cedula de Identidad (Solicitante) </td>
                    <td>[__] Extracto de Salario</td>
                </tr>
                <tr>
                    <td>[__] Factura de Servicios Basicos</td>
                    <td>[__] Fotocopia de Cedula de Identidad (Co-deudor)</td>
                </tr>
                <tr>
                    <td>[__] Autorizacion de Descuento</td>
                    <td>[__] Constancias Medica</td>
                </tr>
                <tr>
                    <td>[__] Certificado de Defuncion</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div class="title" style="font-size: 10px !important;">Con caracter de Declaracion Jurada, expreso que los datos consignados precedentemente son veridicos</div>
        <table class="table">
            <thead>
                <tr>
                    <td>Firma del Afiliado</td>
                    <td>Firma del Co-deudor</td>
                    <td>Mesa de Entrada</td>
                    <td>Div. Operaciones</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><br><br><br><br></td>
                    <td><br><br><br><br></td>
                    <td><br><br><br><br></td>
                    <td><br><br><br><br></td>
                </tr>
            </tbody>
        </table>
        <div class="title">Importante</div>
        <div>La Caja no considerara ninguna Solicitud de Prestamo, si el "Afiliado" no proporciona todos los datos en el presente Formulario.</div>
    </div>
    <div style="page-break-before: always;"></div>
    <!-- DEBITO AUTOMATICO -->
    <div>
        <table style="width: 100%">
            <tr>
                <td>
                    <img src="{{ asset('storage/logo.png') }}" height="50" />
                </td>
                <td>
                    <p style="line-height: 1.4rem; text-align: right">
                        Autorización de descuento de prestamo otorgado por la Caja Municipal con carácter <strong>IRREVOCABLE</strong>
                    </p>
                </td>
            </tr>
        </table>
        <div style="text-align: justify">
            <div style="text-align: right">
                Asunción, {{ date('d', strtotime($data['created_at'])) }} de {{ $meses[date('m', strtotime($data['created_at'])) - 1] }} de {{ date('Y', strtotime($data['created_at'])) }}
            </div>
            <strong>
                Señor
                <br />
                Representante Municipal de {{ $data->affiliate->municipality->name }}
            </strong>
            <br /><br />
            El que suscribe, <span class="text">{{ $data->affiliate->name }} {{ $data->affiliate->lastname }}</span> bajo su muy digno cargo, se dirige a usted, con el objeto de autorizar suficientemente a proceder al descuento de mis haberes, el importe de las cuotas del PRÉSTAMO, que me fuera concedido por la CAJA DE JUBILACIONES Y PENSIONES DEL PERSONAL MUNICIPAL, conforme a los términos de la Resolución N° <span class="text">-</span> obrante en Acta N° <span class="text">-</span> de fecha <span class="text">-</span> del Consejo de Administración.
            <br /><br />
            Monto: <span class="text">{{ number_format($data->amount, 0, '.', '.') }}</span> Gs. seg. Resolución N° <span class="text">-</span>
            <br /><br />
            La presente autorización es <strong>IRREVOCABLE</strong> tendrá validez, hasta la total cancelación del préstamo otorgándome, por la Caja de Jubilaciones y Pensiones del Personal Municipal y no podrá dejarse sin efecto bajo ninguna circunstancia.
            <br />
            Para el efecto faculto expresamente a la Caja de Jubilaciones y Pensiones del Personal Municipal la inclusión del importe&nbsp;de las cuotas del referido préstamo en la Planilla de descuentos a ser remitida a la institución a su cargo mensualmente durante el tiempo de permanencia en la institución.
            <br /><br /><br /><br />
            <table style="text-align:center; width: 100%">
                <tr>
                    <td>____________________________ <br />Firma</td>
                    <td>____________________________ <br />C.I.N°</td>
                </tr>
            </table>
            Certificamos que el monto consignado mas arriba son ciertos y fidedignos por lo que suscribimos en representación de la Caja de Jubilaciones y Pensiones del Personal Municipal.
        </div>
    </div>
    <div style="page-break-before: always;"></div>
    <!-- FORM DE SEGURO -->
    <div>
        <table style="width: 100%">
            <tr>
                <th>
                    <img src="{{ asset('storage/logo-seguro.png') }}" height="128" />
                    {{-- <img src="{{ asset('storage/logo-seguro.png') }}" height="128" /> --}}
                </th>
                <th>
                    <p style="text-align: right; margin-bottom: 5px">SEGURO COLECTIVO DE VIDA PARA DEUDORES</p>
                    <p style="text-align: right"><strong>Solicitud de Incorporación</strong></p>
                </th>
            </tr>
        </table>
        <div style="text-align: justify">
            <br />
            Por la presente solicito a LA CONSOLIDADA S.A. de Seguros mi incorporación al Seguro colectivo de la Vida para Deudores contratado por Caja de Jubilaciones y Pensiones del Personal Municipal en un todo de acuerdo a las Condiciones Generales y Particulares de la Póliza emitida a nombre de esta en mi carácter de prestatario del mismo y de conformidad con las siguientes informaciones que le proporciono, declarando a los efectos de este seguro, encontrarme en buena condición de salud.
            <br /><br />
            Nombre (s) y Apellido (s)
            <span class="text">{{ $data->affiliate->name . ' ' . $data->affiliate->lastname }}</span>
            <br />
            Lugar y fecha de nacimientos
            <span class="text">{{ date('d-m-Y', strtotime($data->affiliate->birthday)) }}</span>
            C.I. numero
            <span class="text">{{ number_format($data->affiliate->document_number, 0, '.', '.') }} (CIP)</span>
            <br />
            Dirección particular
            <span class="text"> {{ $data->affiliate->address[0]->address }} </span>
            Teléfono
            <span class="text"> {{ @$data->affiliate->user->phone }} </span>
            <br />
            Monto de crédito
            <span class="text"> {{ number_format($data->amount,0,'.','.') }} </span>
            <br />
            Plazo forma de Amortización
            <span class="text"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> Meses
            <span class="text"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> Mensual
            <span class="text"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> Vto.
            <span class="text"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
            <br />
            Fecha de Adjudicación del Crédito
            <span class="text"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> Dia
            <span class="text"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> Mes
            <span class="text"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> Año
            <span class="text"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
            <br />
            Importe del Premio del Seguro (guaraníes)
            <br />
            DECLARACIÓN DE SALUD DEL SOLICITANTE
            <br />
            CÓDIGO CIVIL (Art. 1549). Toda declaración falsa, omisión o reticencia de circunstancias conocidas por el Asegurado, que hubiese impedido el contrato o modificado sus condiciones, si el Asegurador hubiese sido informado del verdadero estado del riesgo, hace anulable el contrato.
            <br />
            ¿De que enfermedad sufre o ha sufrido actualmente?
            <span class="text">{{ $data->affiliate->health[0]['disease'] == 1 ? 'SI' : 'NO' }}</span>
            <br />
            En caso afirmativo, consigne detalles
            <span class="text"> {{ $data->affiliate->health[0]['disease_text'] }} </span>
            <br />
            Intervenciones quirúrgicas que ha tenido
            <span class="text">{{ $data->affiliate->health[0]['surgery'] == 1 ? 'SI - ' : 'NO' }} {{ $data->affiliate->health[0]['surgery_text'] }}</span>
            <br />
            ¿Piensa someterse a intervenciones quirúrgicas en los próximos meses?
            <span class="text">{{ $data->affiliate->health[0]['surgery_future'] == 1 ? 'SI - ' : 'NO' }} {{ $data->affiliate->health[0]['surgery_future_text'] }}</span>
            <br />
            ¿Fuma?
            <span class="text">{{ $data->affiliate->health[0]['smoke'] == 1 ? 'SI' : 'NO' }}</span>
            <br />
            ¿Practica deporte?
            <span class="text">{{ $data->affiliate->health[0]['sport'] == 1 ? 'SI' : 'NO' }}</span>
            <br />
            ¿Usa moto?
            <span class="text">{{ $data->affiliate->health[0]['motorcycle'] == 1 ? 'SI' : 'NO' }}</span>
            <br />
            ¿Se Somete a chequeos de rutina?
            <span class="text">{{ $data->affiliate->health[0]['routine'] == 1 ? 'SI' : 'NO' }}</span>
            Con qué frecuencia?
            <span class="text">cada {{ $data->affiliate->health[0]['routine_text'] }} meses</span>
            <br />
            Profesión u ocupación actual
            <span class="text"> {{ $data->affiliate->job[0]->position }} </span>
            <br />
            Estatura (Cm)
            <span class="text"> {{ $data->affiliate->health[0]['height'] }} </span> Peso (Kg)
            <span class="text"> {{ $data->affiliate->health[0]['weight'] }} </span>
            <br />
            Autoriza Ud. con relación al seguro, a los médicos que le han asistido o examinado que lo hagan en el futuro, a proporcionar los datos que posean o informes que conozca sobre su salud o enfermedad padecida
            <span class="text">SI</span>
            <br />
            Asunción, {{ date('d', strtotime($data['created_at'])) }} de {{ $meses[date('m', strtotime($data['created_at'])) - 1] }} de {{ date('Y', strtotime($data['created_at'])) }}
            <br /><br /><br /><br />
            <table style="text-align:center; width: 100%">
                <tr>
                    <td>p/ el Principal y/o Acreedor</td>
                    <td>Firma de Solicitante y/o Deudor C.I.N°</td>
                </tr>
            </table>
        </div>
    </div>
    <div style="page-break-before: always;"></div>
    <!-- DOCUMENTOS ANEXOS -->
    <div>
        <p>DOCUMENTOS ANEXOS</p>
        @if (!empty($data->affiliate->user))
        <!--<img src="{{ Storage::url($data->affiliate->user->doc_f)}}" width="45%" alt="">-->
        <!--<img src="{{ Storage::url($data->affiliate->user->doc_p)}}" width="45%" alt="">-->
        <img src="{{ asset('storage/'. $data->affiliate->user->doc_f)}}" width="45%" alt="">
        <img src="{{ asset('storage/'. $data->affiliate->user->doc_p)}}" width="45%" alt="">
        @endif
        @foreach ($data->files as $item)
        <img src="{{ Storage::url($item->value)}}" width="45%" alt="">
        @endforeach
    </div>
</div>
