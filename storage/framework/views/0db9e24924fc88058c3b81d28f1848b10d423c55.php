<?php $__env->startSection('title', 'Ley 2991 - ' . $data->name); ?>

<?php $__env->startSection('options'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ley2991.create')): ?>
        <a href="<?php echo e(route('ley2991.create', ['id'=> $data->id])); ?>" class="bg-primary font-semibold text-white text-sm rounded px-4 py-2">Agregar</a>
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
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Periodo</th>
                            <th scope="col" class="relative px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php $__currentLoopData = $data->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 uppercase"><?php echo e($item->nombre); ?> / <?php echo e($item->year); ?> </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ley2991.edit')): ?>
                                <a class="ml-2" href="<?php echo e(route('ley2991.edit', $item)); ?>"><i class="fas fa-pencil-alt"></i></a>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/ley2991/show.blade.php ENDPATH**/ ?>