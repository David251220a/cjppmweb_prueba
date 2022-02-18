<?php $__env->startSection('title', 'Cambiar contraseña'); ?>

<?php $__env->startSection('main'); ?>
<form action="<?php echo e(route('password')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="password">Contraseña Actual</label>
        <input type="password" name="password" id="password" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(old('password')); ?>">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="newpassword">Nueva contraseña</label>
        <input type="password" name="newpassword" id="newpassword" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(old('newpassword')); ?>">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="repassword">Repetir la nueva contraseña</label>
        <input type="password" name="repassword" id="repassword" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(old('repassword')); ?>">
    </div>
    <button class="bg-primary font-semibold text-white rounded px-4 py-3" type="submit">Cambiar contraseña</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/users/password.blade.php ENDPATH**/ ?>