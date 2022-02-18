<?php $__env->startSection('title', 'Editar documento ' . $data->document->name); ?>

<?php $__env->startSection('main'); ?>
<form action="<?php echo e(route('ley2991.update', $data)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="year">Año</label>
        <select name="year" id="year" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
            <option <?php echo e($data->year == '2021' ? 'selected' : null); ?> value="2022">2022</option>
            <option <?php echo e($data->year == '2021' ? 'selected' : null); ?> value="2021">2021</option>
            <option <?php echo e($data->year == '2020' ? 'selected' : null); ?> value="2020">2020</option>
            <option <?php echo e($data->year == '2019' ? 'selected' : null); ?> value="2019">2019</option>
        </select>
    </div>

    <div class="mb-4">

        <label class="block font-semibold text-gray-500 mb-2" for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(old('nombre', $data->nombre)); ?>" required>

    </div>

    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="file">Archivo</label>
        <input type="file" name="file" id="file" class="block bg-white border rounded px-4 py-2 w-full focus:outline-none" required>
    </div>
    <input type="hidden" name="document_id" value="<?php echo e($data->document->id); ?>">
    <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
    <button class="bg-primary font-semibold text-white rounded px-4 py-3" type="submit">Guardar</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/ley2991/edit.blade.php ENDPATH**/ ?>