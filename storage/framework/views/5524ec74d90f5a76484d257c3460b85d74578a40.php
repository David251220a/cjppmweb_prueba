

<?php $__env->startSection('title', 'Censo:'. $affiliate->name .' '.$affiliate->lastname.'!'); ?>

<?php $__env->startSection('main'); ?>

    <div>
        <form action="<?php echo e(route('jubilacion.update', $affiliate)); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <div class="bg-white rounded overflow-hidden shadow mb-4">

                <div class="bg-gray-200 font-semibold px-4 py-2">Datos Personales</div>
                <div class="grid md:grid-cols-4 gap-4 px-4 py-6">
                    <input type="hidden" name="id" value="<?php echo e($affiliate->id); ?>">
                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="documento">Documento</label>
                        <input type="text" name="documento" id="documento" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e($affiliate->document_number); ?>" >
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e($affiliate->name); ?>" >
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="apellido">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e($affiliate->lastname); ?>" >
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(date('Y-m-d', strtotime($affiliate->birthday ))); ?>" >
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="estado_civil">Estado Civil</label>
                        <select name="estado_civil" id="estado_civil" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                            <?php $__currentLoopData = $civil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e($item->id == $affiliate->civil_id ? 'selected' : null); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="sex">Sexo</label>
                        <select name="sex" id="sex" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                            <option <?php echo e($affiliate->sex == 'F' ? 'selected' : null); ?> value="F">Femenino</option>
                            <option <?php echo e($affiliate->sex == 'M' ? 'selected' : null); ?> value="M">Masculino</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="telefono">Telefono</label>
                        <input type="text" name="telefono" id="telefono" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e((empty($affiliate->user->phone) ? null : '0'. substr($affiliate->user->phone, 3 ,10))); ?>" >
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="departamento">Departamento</label>
                        <select name="departamento" id="departamento" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                            <?php $__currentLoopData = $departamento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e($item->id_departamento == $affiliate->id_departamento ? 'selected' : null); ?> value="<?php echo e($item->id_departamento); ?>"><?php echo e($item->desc_departamento); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="tipo_afiliado">Tipo de Afiliado</label>
                        <input type="text" name="tipo_afiliado" id="tipo_afiliado" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e($affiliate->type->name); ?>" >
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="municipio">Municipio</label>
                        <input type="text" name="municipio" id="municipio" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e($affiliate->municipality->name); ?>" >
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="Fecha_actualizacion">Ultima Actualización</label>
                        <input type="date" name="Fecha_actualizacion" id="Fecha_actualizacion" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e((empty($affiliate->censo->updated_at) ? null : date('Y-m-d', strtotime($affiliate->censo->updated_at)))); ?>" >
                    </div>
                    
                </div>
            </div>

            <div class="bg-gray-200 font-semibold px-4 py-2">Datos de la Vivienda</div>
                <div class="grid md:grid-cols-4 gap-4 px-4 py-6">
            
                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccion" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e((empty($affiliate->address[0]->address) ? null : $affiliate->address[0]->address)); ?>" >
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="ciudad">Ciudad</label>
                        <input type="text" name="ciudad" id="ciudad" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e((empty($affiliate->address[0]->city) ? null : $affiliate->address[0]->city)); ?>" >
                    </div>
                    
                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="barrio">Barrio</label>
                        <input type="text" name="barrio" id="barrio" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e((empty($affiliate->address[0]->neighborhood) ? null : $affiliate->address[0]->neighborhood)); ?>" >
                    </div>

                </div>

                <div class="bg-gray-200 font-semibold px-4 py-2">Datos de con quíen recide el Afiliado</div>
                <div class="grid md:grid-cols-4 gap-4 px-4 py-6">
            
                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="documento_encargado">Documento</label>
                        <input type="text" name="documento_encargado" id="documento_encargado" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e((empty($affiliate->censo->documento_encargado) ? null : $affiliate->censo->documento_encargado)); ?> ">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="nombre_apellido">Nombre y Apellido</label>
                        <input type="text" name="nombre_apellido" id="nombre_apellido" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e((empty($affiliate->censo->encargado) ? null : $affiliate->censo->encargado)); ?>" >
                    </div>                    
                    
                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="numero_celular">Numero Celular</label>
                        <input type="text" name="numero_celular" id="numero_celular" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e((empty($affiliate->censo->numero_telefono_encargado) ? null :  $affiliate->censo->numero_telefono_encargado)); ?>" >
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold text-gray-500 mb-2" for="parentesco">Parentesco</label>
                        <select name="parentesco" id="parentesco" class="block border rounded px-4 py-2 w-full focus:outline-none" >
                            
                            <?php if(empty($affiliate->censo->parentesco)): ?>
                                <option value="1">Hijo/a</option>
                                <option value="2">Hermano/a</option>
                                <option value="3">Nieto/a</option>
                                <option value="4">Otro</option>
                            <?php else: ?>
                                <option <?php echo e($affiliate->censo->parentesco == 1 ? 'selected' : null); ?> value="1">Hijo/a</option>
                                <option <?php echo e($affiliate->censo->parentesco == 2 ? 'selected' : null); ?> value="2">Hermano/a</option>
                                <option <?php echo e($affiliate->censo->parentesco == 3 ? 'selected' : null); ?> value="3">Nieto/a</option>
                                <option <?php echo e($affiliate->censo->parentesco == 4 ? 'selected' : null); ?> value="4">Otro</option>
                            <?php endif; ?>
                            

                        </select>
                    </div>

                </div>

            <button class="bg-primary font-semibold text-white rounded px-4 py-2 w-full" type="submit">Actualizar Datos</button>

        </form>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/jubilacion/edit.blade.php ENDPATH**/ ?>