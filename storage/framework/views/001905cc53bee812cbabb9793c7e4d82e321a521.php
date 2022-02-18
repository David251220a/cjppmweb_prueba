<?php $__env->startSection('title', 'Crear grupo'); ?>

<?php $__env->startSection('main'); ?>
<form action="<?php echo e(route('role.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="name">Grupo ID</label>
        <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(old('name')); ?>">
    </div>
    <button class="bg-primary font-semibold text-white rounded px-4 py-3" type="submit">Guardar</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/roles/create.blade.php ENDPATH**/ ?>