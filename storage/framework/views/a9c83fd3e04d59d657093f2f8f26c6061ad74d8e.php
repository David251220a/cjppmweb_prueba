<?php $__env->startSection('title', 'Editar prestamos'); ?>

<?php $__env->startSection('main'); ?>
<form action="<?php echo e(route('loan.update', $data)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="name">Nombre</label>
        <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->name); ?>">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="exp">Exp Global</label>
        <input type="text" name="exp" id="exp" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->exp); ?>">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="exp_active">Exp. Activo</label>
        <input type="text" name="exp_active" id="exp_active" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->exp_active); ?>">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="exp_passive">Exp. Pasivo</label>
        <input type="text" name="exp_passive" id="exp_passive" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->exp_passive); ?>">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="active">Activo</label>
        <select name="active" id="active" class="block border rounded px-4 py-2 w-full focus:outline-none">
            <option value="1" <?php echo e($data->active == 1 ? 'selected' : null); ?>>SI</option>
            <option value="0" <?php echo e($data->active == 0 ? 'selected' : null); ?>>NO</option>
        </select>
    </div>
    <button class="bg-primary font-semibold text-white rounded px-4 py-3" type="submit">Guardar</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/loan/edit.blade.php ENDPATH**/ ?>