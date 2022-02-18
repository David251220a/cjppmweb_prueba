

<?php $__env->startSection('title', 'Jubilaciones'); ?>

<?php $__env->startSection('search', true); ?>

<?php $__env->startSection('options'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Documento</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre y Apellido</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo Afiliado</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Ult/Actual.</th>
                                <th scope="col" class="relative px-6 py-3"></th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__currentLoopData = $jubilaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e(number_format($item->document_number, 0, ".", ".")); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->name); ?> <?php echo e($item->lastname); ?></td>                                
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->type->name); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e((empty($item->censo->updated_at) ? null: $item->censo->updated_at )); ?></td>
                                <td class="flex gap-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    
                                    
                                    <a class="ml-2" href="<?php echo e(route('jubilacion.show', $item)); ?>"><i class="fas fa-eye"></i></a>
                                                                        
                                    <a class="ml-2" href="<?php echo e(route('censo_log', $item)); ?>"><i class="far fa-caret-square-down"></i></a>
                                    
                                    <a class="ml-2" href="<?php echo e(route('jubilacion.edit', $item)); ?>"><i class="fas fa-pencil-alt"></i></a>
                                    

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <?php echo e($jubilaciones->links()); ?>

    </div>
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/jubilacion/index.blade.php ENDPATH**/ ?>