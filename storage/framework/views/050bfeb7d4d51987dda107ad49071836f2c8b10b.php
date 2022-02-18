<?php $__env->startSection('title', 'Estado del expediente '. $lrequest->loan->exp . ($lrequest->passive == '1' ? $lrequest->loan->exp_passive : $lrequest->loan->exp_active) . 100000 + $lrequest->number); ?>

<?php $__env->startSection('main'); ?>
<form action="" method="POST">
    <?php echo csrf_field(); ?>
    <div>
        <label class="block font-semibold text-gray-500 mb-2" for="status_id">Estado</label>
        <select name="status_id" id="status_id" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option <?php echo e($lrequest->status->id == $item->id ? 'selected' : null); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <button class="bg-primary font-semibold text-white rounded mt-4 px-4 py-2" type="submit">Editar</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/loan/request-s.blade.php ENDPATH**/ ?>