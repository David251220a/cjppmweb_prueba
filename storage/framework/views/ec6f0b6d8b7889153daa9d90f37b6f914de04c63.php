<?php $__env->startSection('title', 'Portal de autogestión'); ?>

<?php $__env->startSection('main'); ?>
<form action="<?php echo e(route('forgot')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="document">Nro de Documento</label>
        <input type="tel" name="document" id="document" class="block border rounded px-4 py-3 w-full" value="<?php echo e(old('document')); ?>" required />
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="birthday">Fecha de nacimiento</label>
        <input type="date" name="birthday" id="birthday" class="block border rounded px-4 py-3 w-full" value="<?php echo e(old('birthday')); ?>" required />
    </div>
    <div>
        <button type="submit" class="block bg-primary font-semibold text-white text-center uppercase rounded shadow px-4 py-3 w-full">Restablecer contraseña</button>
    </div>
</form>
<a class="block border border-primary font-semibold text-primary text-center uppercase rounded shadow mt-4 px-4 py-3 w-full" href="<?php echo e(route('login')); ?>">Cancelar</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/auth/forgot.blade.php ENDPATH**/ ?>