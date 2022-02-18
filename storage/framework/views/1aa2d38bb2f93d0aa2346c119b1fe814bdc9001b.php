<?php $__env->startSection('main'); ?>
<section class="bg-gray-100 relative border-b border-gray-100 h-60 md:h-96">
    <div class="h-full" id="map"></div>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&sensor=true">
    </script>
    <script type="text/javascript">
        function initialize() {
            var mapOptions = {
                center: new google.maps.LatLng(-25.2771957, -57.6396422),
                zoom: 16,
            };
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            var latlng = new google.maps.LatLng(-25.2771957, -57.6396422);
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</section>
<section class="py-8 md:py-16">
    <div class="container px-4">
        <div class="grid gap-12 md:grid-cols-3">
            <div class="px-4 py-14 md:col-span-2 md:p-0">
                <div class="title mb-10">
                    <h1 class="font-bold text-gray-700 text-2xl mb-3 md:text-4xl">Dejanos un mensaje</h1>
                    <div class="bg-primary h-1 w-20"></div>
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
                <div class="bg-green-100 border border-green-200 text-green-900 mb-4 px-4 py-3">
                    <?php echo e(session()->get('message')); ?>

                </div>
                <?php endif; ?>

                
                <form action="<?php echo e(route('contact')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="grid gap-8 md:grid-cols-2">
                        <div>
                            <label htmlFor="name" class="block font-semibold text-gray-500 mb-2">
                                Nombre
                            </label>
                            <input type="text" name="name" id="name" class="block bg-gray-50 border rounded w-full p-3" required />
                        </div>
                        <div>
                            <label htmlFor="lastname" class="block font-semibold text-gray-500 mb-2">
                                Apellido
                            </label>
                            <input type="text" name="lastname" id="lastname" class="block bg-gray-50 border rounded w-full p-3" required />
                        </div>
                        <div>
                            <label htmlFor="email" class="block font-semibold text-gray-500 mb-2">
                                Correo Electrónico
                            </label>
                            <input type="email" name="email" id="email" class="block bg-gray-50 border rounded w-full p-3" required />
                        </div>
                        <div>
                            <label htmlFor="phone" class="block font-semibold text-gray-500 mb-2">
                                Teléfono
                            </label>
                            <input type="text" name="phone" id="phone" class="block bg-gray-50 border rounded w-full p-3" required />
                        </div>
                        <div class="md:col-span-2">
                            <label htmlFor="subject" class="block font-semibold text-gray-500 mb-2">
                                Asunto
                            </label>
                            <input type="text" name="subject" id="subject" class="block bg-gray-50 border rounded w-full p-3" required />
                        </div>
                        <div class="md:col-span-2">
                            <label htmlFor="message" class="block font-semibold text-gray-500 mb-2">
                                Mensaje
                            </label>
                            <textarea name="message" id="message" class="block bg-gray-50 border rounded w-full p-3 resize-none" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="bg-primary text-white px-6 py-3 rounded font-semibold tracking-wide mt-5">
                            Enviar Mensaje
                        </button>
                    </div>
                </form>
            </div>
            <div class="bg-gray-50 px-4 py-14 md:bg-transparent md:p-0">
                <div class="title mb-10">
                    <h1 class="font-bold text-gray-700 text-2xl mb-3 md:text-4xl">Datos de contacto</h1>
                    <div class="bg-primary h-1 w-20"></div>
                </div>
                <div class="mb-8">
                    <p class="font-bold text-green-900 mb-2">Sede Central</p>
                    <p class="text-gray-500">Benjamin Constant 955 c/ Colon y Montevideo</p>
                    <p class="text-gray-500 mb-3">Asunción - Paraguay</p>
                    <p class="text-green-900">
                        <i class="fab fa-whatsapp mr-2 mb-3"></i> +595 (974) 976-599
                    </p>
                    <p class="text-green-900">
                        <i class="fas fa-phone-alt mr-2 mb-3"></i> +595 (021) 497-189
                    </p>
                    <p class="text-green-900">
                        <i class="fas fa-phone-alt mr-2 mb-3"></i> +595 (021) 496-473
                    </p>
                    <p class="text-green-900">
                        <i class="fas fa-envelope mr-2 mb-3"></i> dg.direccion@cjppm.gov.py
                    </p>
                </div>
                <p class="font-bold text-green-900 mb-4">Horario de Atención</p>
                <div class="border-l-8 bg-green-50 border-primary px-4 py-2">
                    <p class="font-semibold">Lunes a Viernes</p>
                    <p>8:00 a 15:00 hs.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.www', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/www/contact.blade.php ENDPATH**/ ?>