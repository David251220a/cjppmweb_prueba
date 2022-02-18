<?php $__env->startSection('main'); ?>
<section class="py-8 md:py-16">
    <div class="container px-4">
        <div class="title mb-10">
            <h1 class="font-bold text-gray-700 text-2xl mb-3 md:text-4xl"><?php echo e(@$data['id'] ? $data['title'] : 'Noticias'); ?></h1>
            <div class="bg-primary h-1 w-20"></div>
            <p class="font-semibold text-gray-400 mt-2"><?php echo e(@$data['created_at']); ?></p>
        </div>
        <div>
            
            <?php if(@$data['id']): ?>
            <div>
                <?php if(!empty($data['photo'])): ?>
                <img class="border p-1 mb-4 w-full" src="<?php echo e(Storage::url($data['photo'])); ?>" alt="">
                <?php endif; ?>
                <p><?php echo html_entity_decode($data->content); ?></p>
            </div>

            
            <?php else: ?>
            <div class="grid grid-cols-3 gap-8">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('wnews', $item->slug)); ?>">
                    <div class="border font-bold text-white rounded overflow-hidden">
                        <div class="bg-primary px-4 py-3"><?php echo e($item['title']); ?></div>
                        <img class="w-full" src="<?php echo e(Storage::url($item['photo'])); ?>" alt="">
                        <div class="bg-gray-200 text-gray-400 text-sm px-4 py-2">
                            <?php echo e($item->created_at->format('d-m-Y')); ?>

                        </div>
                    </div>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.www', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/www/news.blade.php ENDPATH**/ ?>