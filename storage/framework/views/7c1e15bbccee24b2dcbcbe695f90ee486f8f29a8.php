<?php $__env->startSection('title', 'Agrega afiliados'); ?>

<?php $__env->startSection('main'); ?>
<form action="<?php echo e(route('affiliate.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="name">Nombre</label>
        <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="lastname">Apellido</label>
        <input type="text" name="lastname" id="lastname" class="block border rounded px-4 py-2 w-full focus:outline-none">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="birthday">F. de Nac.</label>
        <input type="date" name="birthday" id="birthday" class="block border rounded px-4 py-2 w-full focus:outline-none">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="sex">Sexo</label>
        <select name="sex" id="sex" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
            <option value="F">Femenino</option>
            <option value="M">Masculino</option>
        </select>
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="civil_id">Estado civil</label>
        <select name="civil_id" id="civil_id" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
            <?php $__currentLoopData = $civil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="document_number">Documento Nr.</label>
        <input type="text" name="document_number" id="document_number" class="block border rounded px-4 py-2 w-full focus:outline-none">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="folder_id">Legajo ID</label>
        <input type="text" name="folder_id" id="folder_id" class="block border rounded px-4 py-2 w-full focus:outline-none">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="municipality_id">Municipio</label>
        <select name="municipality_id" id="municipality_id" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
            <?php $__currentLoopData = $municipality; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="type_id">Categoria</label>
        <select name="type_id" id="type_id" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <button class="bg-primary font-semibold text-white rounded px-4 py-3" type="submit">Guardar</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/affiliate/create.blade.php ENDPATH**/ ?>