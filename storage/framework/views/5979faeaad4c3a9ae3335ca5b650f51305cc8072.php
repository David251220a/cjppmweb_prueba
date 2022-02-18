<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name')); ?></title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    
    
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-P7ZH40XB77"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());
        gtag("config", "G-P7ZH40XB77");
    </script>
    
</head>

<body>
    <div class="bg-dark min-h-screen">
        <div class="container">
            <div class="flex justify-center py-16">
                <div class="w-full md:w-2/3 lg:w-1/3">
                    
                    <a href="<?php echo e(route('home')); ?>">
                        <img src="<?php echo e(Storage::url('logo-icon-light.svg')); ?>" class="h-28 mx-auto mb-10" alt="">
                    </a>

                    
                    <?php if($errors->any()): ?>
                    <div class="bg-red-100 border border-red-200 font-semibold text-red-900 text-sm rounded px-4 py-3 mb-6">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if(session()->has('message')): ?>
                    <div class="bg-green-100 border border-green-200 font-semibold text-green-900 text-sm rounded px-4 py-3 mb-6">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                    <?php endif; ?>

                    
                    <div class="rounded shadow-sm overflow-hidden" style="font-family: Arial, Helvetica, sans-serif">
                        <div class="bg-white px-4 py-6">
                            <div class="mb-6">
                                <h1 class="font-extrabold text-gray-700 uppercase mb-2"><?php echo $__env->yieldContent('title'); ?></h1>
                                <?php if (! empty(trim($__env->yieldContent('message')))): ?>
                                <p class="font-semibold text-gray-500"><?php echo $__env->yieldContent('message'); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if (! empty(trim($__env->yieldContent('main')))): ?>
                            <?php echo $__env->yieldContent('main'); ?>
                            <?php else: ?>
                            <a class="block bg-primary font-semibold text-white text-center uppercase rounded shadow px-4 py-3 w-full" href="<?php echo e(url()->previous()); ?>">Aceptar</a>
                            <?php endif; ?>
                        </div>
                        <div class="bg-gray-100 border-t text-xs text-gray-600 px-4 py-3">
                            <i class="fas fa-network-wired mr-1"></i> <?php echo e(request()->ip()); ?>

                            <?php if(auth()->guard()->check()): ?>
                            <i class="fas fa-user mr-1"></i> <?php echo e(auth()->user()->username); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                    <?php echo $__env->yieldContent('footer'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\cjppm_web\resources\views/layouts/auth.blade.php ENDPATH**/ ?>