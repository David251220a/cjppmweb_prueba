<?php $__env->startSection('title', 'Préstamos'); ?>

<?php $__env->startSection('options'); ?>
<?php if(count($loan) > 0 ): ?>
<a href="<?php echo e(route('prestamos.solicitar')); ?>" class="bg-primary font-semibold text-white text-sm rounded px-4 py-2"><i class="fas fa-plus mr-2"></i> Solicitar un Prestamo</a>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
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
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->Secuencia); ?></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->Cuota_Cobro_Ultimo); ?> / <?php echo e($item->Plazo); ?></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right"><?php echo e(number_format($item->Monto_Prestamo, 0,'.', '.')); ?> Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right"><?php echo e(number_format($item->Monto_Cuota, 0,'.', '.')); ?> Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->Cuota_Fecha_Generacion_Ultima); ?></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right"><?php echo e(number_format($item->Monto_Amortizacion_Total_SaldoActual, 0,'.', '.')); ?> Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->Desc_Producto); ?></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->Id_Dependencia); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    <tfoot class="bg-gray-100">
        <tr>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider"></th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider"></th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider"><?php echo e(number_format($Monto_Prestamo, 0,'.', '.')); ?> Gs</th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider"><?php echo e(number_format($Monto_Cuota, 0,'.', '.')); ?> Gs</th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider"></th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider"><?php echo e(number_format($Monto_Amortizacion_Total_SaldoActual, 0,'.', '.')); ?> Gs</th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider"></th>
            <th class="px-6 py-3 text-right text-sm font-semibold text-gray-500 uppercase tracking-wider"></th>
        </tr>
    </tfoot>
</table>

<?php if($data2): ?>
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
        <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right"><?php echo e(number_format($item->Monto_Total_Cuota_Saldo, 0,'.', '.')); ?> Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right"><?php echo e(number_format($item->Monto_Total_Cuota_Interes_Saldo, 0,'.', '.')); ?> Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right"><?php echo e(number_format($item->Monto_Total_Cuota_Amortizacion_Saldo, 0,'.', '.')); ?> Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right"><?php echo e(number_format($item->Monto_Total_Cuota_Interes_Punitorio_Saldo, 0,'.', '.')); ?> Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right"><?php echo e(number_format($item->Monto_Total_Cuota_Interes_Punitorio_Congelado, 0,'.', '.')); ?> Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right"><?php echo e(number_format($item->Monto_Total_Cuota_Seguro_Saldo, 0,'.', '.')); ?> Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right"><?php echo e(number_format($item->Monto_Total_IVA, 0,'.', '.')); ?> Gs.</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right"><?php echo e(number_format(($item->Monto_Total_Cuota_Saldo+$item->Monto_Total_Cuota_Interes_Punitorio_Saldo+$item->Monto_Total_Cuota_Interes_Punitorio_Congelado+$item->Monto_Total_Cuota_Seguro_Saldo+$item->Monto_Total_IVA), 0,'.', '.')); ?> Gs.</td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php endif; ?>

<?php if($data3): ?>
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
        <?php $__currentLoopData = $data3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->loan->exp); ?><?php echo e($item->passive == '1' ? $item->loan->exp_passive : $item->loan->exp_active); ?><?php echo e(100000 + $item->number); ?></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->loan->name); ?></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right"><?php echo e(number_format($item->amount,0,',','.')); ?> Gs</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->status->name); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/prestamo.blade.php ENDPATH**/ ?>