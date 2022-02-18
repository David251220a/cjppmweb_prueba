<?php $__env->startSection('title', $data->name); ?>
<?php $__env->startSection('search', true); ?>

<?php $__env->startSection('options'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('loan.request.create')): ?>
<a href="<?php echo e(route('lrequest.create', ['loan' => $data])); ?>" class="bg-primary font-semibold text-white text-sm rounded px-4 py-2">Agregar</a>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
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
                        <?php $__currentLoopData = $request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->loan->exp); ?><?php echo e($item->passive == '1' ? $data->exp_passive : $data->exp_active); ?><?php echo e(100000 + $item->number); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->affiliate->document_number); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->affiliate->name); ?> <?php echo e($item->affiliate->lastname); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right"><?php echo e(number_format($item->amount,0,',','.')); ?> Gs</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->status->name); ?></td>
                            <td class="flex gap-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('loan.request.show')): ?>
                                <a class="ml-2" href="<?php echo e(route('lrequest.show', ['loan' => $data, 'lrequest' => $item])); ?>"><i class="fas fa-eye"></i></a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('loan.request.status')): ?>
                                <a class="ml-2" href="<?php echo e(route('lrequest.status', ['loan' => $data, 'lrequest' => $item])); ?>"><i class="fas fa-bars"></i></a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('loan.request.edit')): ?>
                                <a class="ml-2" href="<?php echo e(route('lrequest.edit', ['loan' => $data, 'lrequest' => $item])); ?>"><i class="fas fa-pencil-alt"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/loan/show.blade.php ENDPATH**/ ?>