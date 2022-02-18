<?php $__env->startSection('title', 'Editar grupo'); ?>

<?php $__env->startSection('main'); ?>
<form action="<?php echo e(route('role.update', $data)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="name">Grupo ID</label>
        <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->name); ?>">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2 w-full">Permisos</label>
        <div class="grid grid-cols-4 mb-4">
            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <label><input type="checkbox" name="permissions[]" id="permissions" value="<?php echo e($item['id']); ?>" <?php echo e($data->hasPermissionTo($item['id']) ? 'checked' : null); ?>> <?php echo e($item->name); ?></label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <button class="bg-primary font-semibold text-white rounded px-4 py-3" type="submit">Guardar</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/roles/edit.blade.php ENDPATH**/ ?>