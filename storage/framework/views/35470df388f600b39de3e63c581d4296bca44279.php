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
    
    <script src="https://cdn.tiny.cloud/1/53xm2cwc0n7jtn3s2agxpfh814e6s1wsq21hhkbkwxeyr230/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
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

<body class="relative min-h-screen">
    <header>
        <nav class="bg-green-900">
            <div class="container" x-data="{ show: false }">
                <div class="mx-auto">
                    <div class="relative flex items-center justify-between h-16">
                        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                            <button @click="show = !show" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                                <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                            <div class="flex-shrink-0 flex items-center">
                                <img class="block lg:hidden h-8 w-auto" src="<?php echo e(Storage::url('/logo-icon-light.svg')); ?>" alt="">
                                <div class="hidden lg:flex items-center gap-2">
                                    <img class=" h-8 w-auto" src="<?php echo e(Storage::url('/logo-icon-light.svg')); ?>" alt="">
                                    <span class="font-bold text-white text-2xl">CJPPM</span>
                                </div>
                            </div>
                            <div class="hidden sm:block sm:ml-6">
                                <div class="flex space-x-4">
                                    <a href="<?php echo e(route('portal')); ?>" class="text-gray-300 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Inicio</a>
                                    <?php if(Auth::user()->affiliate->type->active): ?>
                                    <a href="<?php echo e(route('aportes')); ?>" class="text-gray-300 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Mis aportes</a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('prestamos')); ?>" class="text-gray-300 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Mis préstamos</a>
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('news.index')): ?>
                                    <a href="<?php echo e(route('news.index')); ?>" class="text-gray-300 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Noticias</a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ley5189.index')): ?>
                                    <a href="<?php echo e(route('ley5189.index')); ?>" class="text-gray-300 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Ley 5189</a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('municipality.index')): ?>
                                    <a href="<?php echo e(route('municipality.index')); ?>" class="text-gray-300 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Municipios</a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('affiliate.index')): ?>
                                    <a href="<?php echo e(route('affiliate.index')); ?>" class="text-gray-300 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Afiliados</a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('loan.index')): ?>
                                    <a href="<?php echo e(route('loan.index')); ?>" class="text-gray-300 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Prestamos</a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.index')): ?>
                                    <a href="<?php echo e(route('user.index')); ?>" class="text-gray-300 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Usuarios</a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.index')): ?>
                                    <a href="<?php echo e(route('role.index')); ?>" class="text-gray-300 hover:bg-green-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Grupo de usuarios</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                            <div class="ml-3 relative" x-data="{ show: false }">
                                <div @click="show = !show">
                                    <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full" src="<?php echo e(Storage::url('/iconos/user.png')); ?>" alt="">
                                    </button>
                                </div>
                                <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" x-show="show">
                                    <a href="<?php echo e(route('password')); ?>" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Cambiar contraseña</a>
                                    <a href="<?php echo e(route('logout')); ?>" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Salir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile menu, show/hide based on menu state. -->
                <div class="sm:hidden" id="mobile-menu">
                    <div class="px-2 pt-2 pb-3 space-y-1" x-show="show">
                        <a href="<?php echo e(route('portal')); ?>" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Inicio</a>
                        <?php if(Auth::user()->affiliate->type->active): ?>
                        <a href="<?php echo e(route('aportes')); ?>" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Mis aportes</a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('prestamos')); ?>" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Mis préstamos</a>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('news.index')): ?>
                        <a href="<?php echo e(route('news.index')); ?>" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Noticias</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ley5189.index')): ?>
                        <a href="<?php echo e(route('ley5189.index')); ?>" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Ley 5189</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('municipality.index')): ?>
                        <a href="<?php echo e(route('municipality.index')); ?>" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Municipios</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('affiliate.index')): ?>
                        <a href="<?php echo e(route('affiliate.index')); ?>" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Afiliados</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('loan.index')): ?>
                        <a href="<?php echo e(route('loan.index')); ?>" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Prestamos</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.index')): ?>
                        <a href="<?php echo e(route('user.index')); ?>" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Usuarios</a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.index')): ?>
                        <a href="<?php echo e(route('role.index')); ?>" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Grupo de usuarios</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container py-10">
            <div class="mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="font-bold text-gray-700 text-2xl mb-3 md:text-4xl"><?php echo $__env->yieldContent('title'); ?></h1>
                        <div class="bg-primary h-1 w-20"></div>
                    </div>
                    <div class="flex items-center gap-4">
                        
                        <?php if (! empty(trim($__env->yieldContent('search')))): ?>
                        <form class="flex items-center" action="">
                            <label class="font-semibold text-gray-500 mr-2" for="search">Buscar</label>
                            <div class="flex">
                                <input type="text" name="search" id="search" class="border rounded-l px-4 py-1 focus:outline-none">
                                <button class="bg-primary text-white rounded-r px-4" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                        <?php endif; ?>

                        
                        <?php if(@$create): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($create)): ?>
                        <a href="<?php echo e(route($create)); ?>" class="bg-primary font-semibold text-white text-sm rounded px-4 py-2">Agregar</a>
                        <?php endif; ?>
                        <?php endif; ?>

                        
                        <?php echo $__env->yieldContent('options'); ?>

                    </div>
                </div>
            </div>
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
            <?php echo $__env->yieldContent('main'); ?>
        </div>
    </main>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\cjppm_web\resources\views/layouts/app.blade.php ENDPATH**/ ?>