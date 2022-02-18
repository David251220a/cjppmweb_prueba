<?php $__env->startSection('main'); ?>
<section class="py-8 md:py-16">
    <div class="container px-4">
        <div class="title mb-10">
            <h1 class="font-bold text-gray-700 text-2xl mb-3 md:text-4xl"><?php echo e(!empty($data->items) ? $data->name : 'Decreto N° 2991/10'); ?></h1>
            <div class="bg-primary h-1 w-20"></div>
                <?php if(empty($data->items)): ?>

                    <p class="font-semibold text-lg text-gray-500 mt-4 mb-5">

                        El nuevo modelo de rendición de cuentas se desarrolla en base a la metodología establecida en el manual aprobado por el Decreto Nº 2991/19, que encarga a las autoridades de las instituciones
                        del Poder Ejecutivo, a impulsar actividades de rendición sobre su gestión, dirigidos al sujeto destinatario del servicio (el ciudadano), de forma sencilla, amigable y en forma constante,
                        motivando su colaboración en los procesos de toma de decisiones.
                    </p>

                    <p class="font-semibold text-lg text-gray-500 mt-2 mb-5">

                        La coordinación de las acciones recae sobre el Comité de Rendición de Cuentas al Ciudadano (CRCC), instancia constituida en las instituciones, con la misión de elaborar el plan de
                        rendición de cuentas institucional y gestionar los mecanismos necesarios para dar avances al mismo, con la colaboración activa y coordinada de todos sus miembros.
                    </p>

                    <p class="font-semibold text-lg text-gray-500 mt-2 mb-5">

                        El CRCC tiene el encargo de elaborar informes parciales periódicos y un informe final, con sus respetivas evidencias, que se ponen a disposición de la ciudadanía para el libre acceso
                        y control.

                    </p>

                    <p class="font-semibold text-lg text-gray-500 mt-2 mb-10">

                        La Secretaría Nacional Anticorrupción es la institución encargada de reglamentar y supervisar los procedimientos a fin promover el cumplimiento efectivo de las acciones de
                        rendición orientados al ciudadano.

                    </p>

                <?php endif; ?>
        </div>
        <div>
            
            <?php if(!empty($data->items)): ?>

                <div>
                    <?php $__currentLoopData = $data->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if(@$i != $item->year): ?>
                            <h1 class="bg-gray-50 border font-bold text-gray-600 text-xl rounded shadow-sm mb-6 p-4">PERIODO <?php echo e($item->year); ?></h1>
                            <?php
                            $i = $item->year;
                            ?>
                        <?php endif; ?>
                        
                        <?php if($item->year == $i): ?>
                            <div class="inline-block -mr-1 mb-6 w-full md:w-1/4">
                                <a href="<?php echo e(Storage::url($item->file)); ?>" class="block bg-green-50 border border-green-200 font-bold text-green-900 text-center rounded tracking-wide mx-2 p-6" target="_blank">
                                    <i class="far fa-file-pdf text-green-900 text-4xl"></i>
                                    <span class="block mt-2"><?php echo e(Str::upper($item->nombre)); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            
            <?php else: ?>

                <ul>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($item->id == 1): ?>

                            <li class="font-bold uppercase mb-4">
                                <a href="<?php echo e(Storage::url('ley2991/creacion_de_comite.pdf')); ?>" target="_blank">
                                    <i class="fas fa-circle text-secondary mr-2"></i> <?php echo e(@$item->name); ?>

                                </a>
                            </li>

                        <?php elseif($item->id == 2): ?>
                            <li class="font-bold uppercase mb-4">
                                <a href="<?php echo e(Storage::url('ley2991/conformacion_del_comite.pdf')); ?>" target="_blank">
                                    <i class="fas fa-circle text-secondary mr-2"></i> <?php echo e(@$item->name); ?>

                                </a>
                            </li>
                        <?php else: ?>
                            <li class="font-bold uppercase mb-4"><a href="<?php echo e(route('wley2991', @$item->slug)); ?>"><i class="fas fa-circle text-secondary mr-2"></i> <?php echo e(@$item->name); ?></a></li>
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

            <?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.www', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/www/ley2991.blade.php ENDPATH**/ ?>