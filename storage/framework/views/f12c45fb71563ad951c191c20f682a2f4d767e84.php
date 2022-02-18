<?php $__env->startSection('title', 'Perfil afiliados'); ?>

<?php $__env->startSection('main'); ?>
<div class="bg-white rounded overflow-hidden shadow mb-4">
    <div class="bg-gray-200 font-semibold px-4 py-2">Datos del Afiliado</div>
    <div class="grid md:grid-cols-12 gap-4 px-4 py-6">
        <div class="md:col-span-2">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Legajo ID</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="<?php echo e($data->folder_id); ?>">
        </div>
        <div class="md:col-span-4">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Nombre</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="<?php echo e($data->name); ?>">
        </div>
        <div class="md:col-span-4">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Apellido</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="<?php echo e($data->lastname); ?>">
        </div>
        <div class="md:col-span-2">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Categoría</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="<?php echo e($data->type->name); ?>">
        </div>
        <div class="md:col-span-2">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Documento</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="<?php echo e($data->document_type); ?>">
        </div>
        <div class="md:col-span-2">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Documento Nro</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="<?php echo e($data->document_number); ?>">
        </div>
        <div class="md:col-span-2">
            <label class="block font-semibold text-gray-500 mb-2" for="name">F. Nac</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="<?php echo e($data->birthday); ?>">
        </div>
        <div class="md:col-span-3">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Estado Civil</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="<?php echo e($data->civil_id); ?>">
        </div>
        <div class="md:col-span-3">
            <label class="block font-semibold text-gray-500 mb-2" for="name">Sexo</label>
            <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" readonly value="<?php echo e($data->sex); ?>">
        </div>
    </div>
</div>


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
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e(number_format($capacity['available'], 0,'','.')); ?> Gs</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e(number_format($capacity['loan'], 0,'','.')); ?> Gs</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e(number_format($capacity['loan_defaulter'], 0,'','.')); ?> Gs</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e(number_format($capacity['available'] - ($capacity['loan'] + $capacity['loan_defaulter']), 0,'','.')); ?> Gs</td>
            </tr>
        </tbody>
    </table>
</div>

<?php if($data->user): ?>
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
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($data->user->username); ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($data->user->name); ?> <?php echo e($data->user->lastname); ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($data->user->email); ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($data->user->email_verified_at ? 'SI' : 'NO'); ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($data->user->phone); ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($data->user->phone_verified_at ? 'SI' : 'NO'); ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($data->user->birth); ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($data->user->doc_f ? 1 : 0); ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($data->user->doc_p ? 1 : 0); ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($data->user->doc_v ? 1 : 0); ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($data->user->created_at->format('d-m-Y H:i:s')); ?></td>
            </tr>
        </tbody>
    </table>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/affiliate/show.blade.php ENDPATH**/ ?>