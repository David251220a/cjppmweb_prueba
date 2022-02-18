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
            text-align: center;
            text-transform: uppercase;

        }

        .table {
            border-collapse: collapse;
            font-size: 13px;
            line-height: 12px;
            width: 100%
        }

        .myTable {
            /* border-collapse: collapse; */
            font-size: 13px;
            line-height: 15px;
            width: 100%
        }

        /* .table tbody {
            font-weight: bold;
        } */

        .table td {
            border: 1px solid #666666;
            padding: 5px 10px;
        }

    </style>

    <div>

        <table style="margin-bottom: 16px; width: 100%">
            <tr>
                <td>
                    <img src="<?php echo e(Storage::url('logo.png')); ?>" height="50" />
                    
                </td>

            </tr>

        </table>

        <div class="title" style="margin-bottom: 0px">Constancia de Prestamo </div>

        <table class="myTable" style="width: 100%; margin-top: 0px; margin-bottom: 30px; border: 1px solid #009c48;">

            <tbody>
                <tr>
                    <td>
                        Nombre y Apellido: <b><?php echo e($user->affiliate->name); ?> <?php echo e($user->affiliate->lastname); ?></b>
                    </td>
                </tr>
                <tr>
                    <td>
                        Dependencia: <b><?php echo e($user->affiliate->municipality->name); ?></b>
                    </td>
                </tr>
                <tr>
                    <td>
                        Afiliado <b><?php echo e($user->affiliate->type->name); ?></b>
                    </td>
                </tr>
            </tbody>

        </table>

        <table class="table">

            <thead>
                <tr>
                    <th scope="col">Sec.</th>
                    <th scope="col">Cuota / Plazo</th>
                    <th scope="col">Monto Prestamo</th>
                    <th scope="col">Monto cuota</th>
                    <th scope="col" style="padding-right: 0px; padding-left:0px">Ultima/Generacion</th>
                    <th scope="col">Linea</th>
                    <th scope="col">Saldo Actual</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $Monto_Prestamo = 0;
                $Monto_Cuota = 0;
                $Monto_Amortizacion_Total_SaldoActual = 0;
                ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $Monto_Prestamo = $Monto_Prestamo + $item->Monto_Prestamo;
                        $Monto_Cuota = $Monto_Cuota + $item->Monto_Cuota;
                        $Monto_Amortizacion_Total_SaldoActual = $Monto_Amortizacion_Total_SaldoActual + $item->Monto_Amortizacion_Total_SaldoActual;
                    ?>
                    <tr>
                        <td style="text-align: right"><?php echo e($item->Secuencia); ?></td>
                        <td style="text-align: center"><?php echo e($item->Cuota_Cobro_Ultimo); ?> / <?php echo e($item->Plazo); ?></td>
                        <td style="text-align: right"><?php echo e(number_format($item->Monto_Prestamo, 0,'.', '.')); ?> Gs.</td>
                        <td style="text-align: right"><?php echo e(number_format($item->Monto_Cuota, 0,'.', '.')); ?> Gs.</td>
                        <td style="text-align: center"><?php echo e(date('m-Y', strtotime($item->Cuota_Fecha_Generacion_Ultima))); ?></td>
                        <td style="text-align: center"><?php echo e($item->Desc_Producto); ?></td>
                        <td style="text-align: right"><?php echo e(number_format($item->Monto_Amortizacion_Total_SaldoActual, 0,'.', '.')); ?> Gs.</td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

            <tfoot>
                <tr style="font-weight: bold">
                    <td colspan="2"> Totales</td>
                    <td ><?php echo e(number_format($Monto_Prestamo, 0,'.', '.')); ?> Gs</td>
                    <td ><?php echo e(number_format($Monto_Cuota, 0,'.', '.')); ?> Gs</td>
                    <td colspan="3" style="text-align: right"><?php echo e(number_format($Monto_Amortizacion_Total_SaldoActual, 0,'.', '.')); ?> Gs</td>
                </tr>
            </tfoot>

        </table>

    </div>

    <br>

    <div class="title" style="margin-bottom: 15px">Morosidad</div>

    <?php if($data2): ?>

        <table class="table">
            <thead>
                <tr >
                    <td colspan="8" style="text-align: center; font-size: 15px; font-weight: bold">Montos Saldos</td>
                </tr>
                <tr>
                    <td style="font-weight: bold; text-align:center">Cuota</td>
                    <td style="font-weight: bold; text-align:center">Interes</td>
                    <td style="font-weight: bold; text-align:center">Capital</td>
                    <td style="font-weight: bold; text-align:center">Interes Punitorio</td>
                    <td style="font-weight: bold; text-align:center">Int. Punit. Congelado</td>
                    <td style="font-weight: bold; text-align:center">Seguro</td>
                    <td style="font-weight: bold; text-align:center">IVA</td>
                    <td style="font-weight: bold; text-align:center">Total General</td>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(number_format($item->Monto_Total_Cuota_Saldo, 0,'.', '.')); ?> Gs.</td>
                        <td><?php echo e(number_format($item->Monto_Total_Cuota_Interes_Saldo, 0,'.', '.')); ?> Gs.</td>
                        <td><?php echo e(number_format($item->Monto_Total_Cuota_Amortizacion_Saldo, 0,'.', '.')); ?> Gs.</td>
                        <td><?php echo e(number_format($item->Monto_Total_Cuota_Interes_Punitorio_Saldo, 0,'.', '.')); ?> Gs.</td>
                        <td><?php echo e(number_format($item->Monto_Total_Cuota_Interes_Punitorio_Congelado, 0,'.', '.')); ?> Gs.</td>
                        <td><?php echo e(number_format($item->Monto_Total_Cuota_Seguro_Saldo, 0,'.', '.')); ?> Gs.</td>
                        <td><?php echo e(number_format($item->Monto_Total_IVA, 0,'.', '.')); ?> Gs.</td>
                        <td><?php echo e(number_format(($item->Monto_Total_Cuota_Saldo+$item->Monto_Total_Cuota_Interes_Punitorio_Saldo+$item->Monto_Total_Cuota_Interes_Punitorio_Congelado+$item->Monto_Total_Cuota_Seguro_Saldo+$item->Monto_Total_IVA), 0,'.', '.')); ?> Gs.</td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

        </table>
    <?php else: ?>
        <p style="margin: 2px; text-align: center">Sin atrasos en prestamos!.</p>
    <?php endif; ?>

    <div class="title" style="margin-top: 15px; margin-bottom: 0px">

        Tu limite para un prestamo es de <?php echo e(number_format($capacity['available'] - ($capacity['loan'] + $capacity['loan_defaulter']), 0,'','.')); ?> Gs.

    </div>
    <table style="width: 100%; margin-top: 0px; margin-bottom: 0px; border: 1px solid #009c48;">
        <tr style="margin-bottom: 0px">
            <td>
                <p style="font-weight: bold; margin: 2%; font-size: 15px">
                    Aporte: <?php echo e(number_format($capacity['available'], 0,'','.')); ?>

                    - (Prestamo: <?php echo e(number_format($capacity['loan'], 0,'','.')); ?>

                    + Morosidad: <?php echo e(number_format($capacity['loan_defaulter'], 0,'','.')); ?>)
                    = <?php echo e(number_format($capacity['available'] - ($capacity['loan'] + $capacity['loan_defaulter']), 0,'','.')); ?> Gs.
                </p>
            </td>
        </tr>
    </table>

    <div style="padding-left: 4px; padding-right: 4px; padding-top: 15px; padding-bottom: 5px; line-height: 18px; text-align: justify"><strong>SEÑOR AFILIADO:</strong> Este documento fue generado el <?php echo e(date('d-m-Y H:i:s')); ?> desde la CJPPM Virtual por el usuario <?php echo e(Auth::user()->username); ?> [<?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->lastname); ?>]. Los aportes detallados corresponden al Planilla de Aportes de Fecha 00/00/0000 remitida por esa Institucion a la Caja. Con el proposito de brindarle un mejor servicio, emitimos este EXTRACTO DE APORTES, rogandole consultarnos cualquier duda al respecto, en la Oficina de la Caja.</div>

</div>
<?php /**PATH C:\laragon\www\cjppm_web\resources\views/documents/constancia_prestamo.blade.php ENDPATH**/ ?>