<?php $__env->startSection('title', 'Portal de autogestión'); ?>

<?php $__env->startSection('main'); ?>
<form action="<?php echo e(route('login')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="username">Nro de Documento</label>
        <input type="text" name="username" id="username" class="block border rounded px-4 py-3 w-full" value="<?php echo e(old('username')); ?>" required />
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-dark mb-1" for="password">Contraseña</label>
        <input type="password" name="password" id="password" class="block border rounded px-4 py-3 w-full" value="<?php echo e(old('password')); ?>" required />
    </div>
    <div>
        <button type="submit" class="block bg-primary font-semibold text-white text-center uppercase rounded shadow px-4 py-3 w-full">Iniciar sesión</button>
    </div>
</form>
<a class="block border border-primary font-semibold text-primary text-center uppercase rounded shadow mt-4 px-4 py-3 w-full" href="<?php echo e(route('forgot')); ?>">Olvidaste tu contraseña?</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<a class="block font-semibold text-white text-center uppercase rounded mt-6 mx-auto" href="<?php echo e(route('register')); ?>">Solicitar clave de acceso</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/auth/login.blade.php ENDPATH**/ ?>