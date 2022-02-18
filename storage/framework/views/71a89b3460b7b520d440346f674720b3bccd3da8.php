<?php $__env->startSection('title', 'Editar expediente '. $data->loan->exp . ($data->passive == '1' ? $data->loan->exp_passive : $data->loan->exp_active) . 100000 + $data->number); ?>

<?php $__env->startSection('main'); ?>
<form action="<?php echo e(route('lrequest.update', ['loan' => $data->loan->id, $data])); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <input type="hidden" name="id" value="<?php echo e($data->affiliate->id); ?>">
    <div class="bg-white rounded overflow-hidden shadow mb-4">
        <div class="bg-gray-200 font-semibold px-4 py-2">Datos del Afiliado</div>
        <div class="grid md:grid-cols-12 gap-4 px-4 py-6">
            <div class="md:col-span-2">
                <label class="block font-semibold text-gray-500 mb-2" for="name">Legajo ID</label>
                <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e($data->affiliate->folder_id); ?>">
            </div>
            <div class="md:col-span-4">
                <label class="block font-semibold text-gray-500 mb-2" for="name">Nombre</label>
                <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e($data->affiliate->name); ?>">
            </div>
            <div class="md:col-span-4">
                <label class="block font-semibold text-gray-500 mb-2" for="name">Apellido</label>
                <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e($data->affiliate->lastname); ?>">
            </div>
            <div class="md:col-span-2">
                <label class="block font-semibold text-gray-500 mb-2" for="type">Categoría</label>
                <input type="text" name="type" id="type" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e($data->affiliate->type->name); ?>">
            </div>
            <div class="md:col-span-2">
                <label class="block font-semibold text-gray-500 mb-2" for="name">Documento</label>
                <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e($data->affiliate->document_type); ?>">
            </div>
            <div class="md:col-span-2">
                <label class="block font-semibold text-gray-500 mb-2" for="name">Documento Nro</label>
                <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e($data->affiliate->document_number); ?>">
            </div>
            <div class="md:col-span-2">
                <label class="block font-semibold text-gray-500 mb-2" for="name">F. Nac</label>
                <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e($data->affiliate->birthday); ?>">
            </div>
            <div class="md:col-span-3">
                <label class="block font-semibold text-gray-500 mb-2" for="name">Estado Civil</label>
                <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e($data->affiliate->civil_id); ?>">
            </div>
            <div class="md:col-span-3">
                <label class="block font-semibold text-gray-500 mb-2" for="name">Sexo</label>
                <input type="text" name="name" id="name" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e($data->affiliate->sex); ?>">
            </div>
        </div>
    </div>
    <div class="bg-white rounded overflow-hidden shadow mb-4">
        <div class="bg-gray-200 font-semibold px-4 py-2">Capacidad de Pago</div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aporte</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prestamos</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Morosidad</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Disponibilidad</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e(number_format($capacity['available'], 0,'','.')); ?> Gs</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e(number_format($capacity['loan'], 0,'','.')); ?> Gs</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e(number_format($capacity['loan_defaulter'], 0,'','.')); ?> Gs</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e(number_format($capacity['available'] - ($capacity['loan'] + $capacity['loan_defaulter']), 0,'','.')); ?> Gs</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="bg-white rounded overflow-hidden shadow mb-4">
        <div class="bg-gray-200 font-semibold px-4 py-2">Direccion</div>
        <div class="grid md:grid-cols-3 gap-4 px-4 py-6">
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="address">Direccion</label>
                <input type="text" name="address" id="address" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->address[0]->address); ?>">
            </div>
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="city">Ciudad</label>
                <input type="text" name="city" id="city" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->address[0]->city); ?>">
            </div>
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="neighborhood">Barrio</label>
                <input type="text" name="neighborhood" id="neighborhood" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->address[0]->neighborhood); ?>">
            </div>
        </div>
    </div>
    <div class="bg-white rounded overflow-hidden shadow mb-4">
        <div class="bg-gray-200 font-semibold px-4 py-2">Dato Laboral</div>
        <div class="grid md:grid-cols-5 gap-4 px-4 py-6">
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="municipality">Municipio</label>
                <input type="text" name="municipality" id="municipality" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e($data->affiliate->municipality->name); ?>">
            </div>
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="position">Cargo</label>
                <input type="text" name="position" id="position" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->job[0]->position); ?>">
            </div>
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="dependence">Dependencia</label>
                <input type="text" name="dependence" id="dependence" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->job[0]->dependence); ?>">
            </div>
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="phone">Telefono</label>
                <input type="text" name="phone" id="phone" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->job[0]->phone); ?>">
            </div>
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="salary">Salario</label>
                <input type="text" name="salary" id="salary" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->job[0]->salary); ?>">
            </div>
        </div>
    </div>
    <div class="bg-white rounded overflow-hidden shadow mb-4">
        <div class="bg-gray-200 font-semibold px-4 py-2">Prestamo solicitado</div>
        <div class="grid md:grid-cols-4 gap-4 px-4 py-6">
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="amount">Monto Solicitado Gs</label>
                <input type="text" name="amount" id="amount" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->amount); ?>">
            </div>
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="time">Plazo del Prestamo (Meses)</label>
                <input type="text" name="time" id="time" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->time); ?>">
            </div>
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="loan">Destino o Aplicacion del Prestamo</label>
                <input type="text" name="loan" id="loan" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e($data->loan->name); ?>">
            </div>
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="previous">Ya obtuvo prestamo de la caja?</label>
                <select name="previous" id="previous" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled required>
                    <option <?php echo e($data->previous == '0' ? 'selected' : null); ?> value="0">NO</option>
                    <option <?php echo e($data->previous == '1' ? 'selected' : null); ?> value="1">SI</option>
                </select>
            </div>
        </div>
    </div>
    <div class="bg-white rounded overflow-hidden shadow mb-4">
        <div class="bg-gray-200 font-semibold px-4 py-2">Referencia Personales</div>
        <div class="grid md:grid-cols-3 gap-4 px-4 py-6">
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="ref1name">Nombre 1</label>
                <input type="text" name="ref1name" id="ref1name" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->reference[0]->name); ?>">
            </div>
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="ref1address">Direccion 1</label>
                <input type="text" name="ref1address" id="ref1address" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->reference[0]->address); ?>">
            </div>
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="ref1phone">Telefono 1</label>
                <input type="text" name="ref1phone" id="ref1phone" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->reference[0]->phone); ?>">
            </div>
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="ref2name">Nombre 2</label>
                <input type="text" name="ref2name" id="ref2name" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->reference[1]->name); ?>">
            </div>
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="ref2address">Direccion 2</label>
                <input type="text" name="ref2address" id="ref2address" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->reference[1]->address); ?>">
            </div>
            <div>
                <label class="block font-semibold text-gray-500 mb-2" for="ref2phone">Telefono 2</label>
                <input type="text" name="ref2phone" id="ref2phone" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->reference[1]->phone); ?>">
            </div>
        </div>
    </div>
    <div class="bg-white rounded overflow-hidden shadow mb-4">
        <div class="bg-gray-200 font-semibold px-4 py-2">Estado de Salud</div>
        <div class="grid md:grid-cols-6 gap-4 px-4 py-6">
            <div class="col-span-2">
                <label class="block font-semibold text-gray-500 mb-2" for="disease">Enfermedad</label>
                <select name="disease" id="disease" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                    <option <?php echo e($data->affiliate->health[0]->disease == '0' ? 'selected' : null); ?> value="0">NO</option>
                    <option <?php echo e($data->affiliate->health[0]->disease == '1' ? 'selected' : null); ?> value="1">SI</option>
                </select>
            </div>
            <div class="col-span-4">
                <label class="block font-semibold text-gray-500 mb-2" for="disease_text">Detalle</label>
                <input type="text" name="disease_text" id="disease_text" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->health[0]->disease_text); ?>">
            </div>
            <div class="col-span-2">
                <label class="block font-semibold text-gray-500 mb-2" for="surgery">Cirugia</label>
                <select name="surgery" id="surgery" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                    <option <?php echo e($data->affiliate->health[0]->surgery == '0' ? 'selected' : null); ?> value="0">NO</option>
                    <option <?php echo e($data->affiliate->health[0]->surgery == '1' ? 'selected' : null); ?> value="1">SI</option>
                </select>
            </div>
            <div class="col-span-4">
                <label class="block font-semibold text-gray-500 mb-2" for="surgery_text">Detalle</label>
                <input type="text" name="surgery_text" id="surgery_text" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->health[0]->surgery_text); ?>">
            </div>
            <div class="col-span-2">
                <label class="block font-semibold text-gray-500 mb-2" for="surgery_future">Cirugia Futura</label>
                <select name="surgery_future" id="surgery_future" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                    <option <?php echo e($data->affiliate->health[0]->surgery_future == '0' ? 'selected' : null); ?> value="0">NO</option>
                    <option <?php echo e($data->affiliate->health[0]->surgery_future == '1' ? 'selected' : null); ?> value="1">SI</option>
                </select>
            </div>
            <div class="col-span-4">
                <label class="block font-semibold text-gray-500 mb-2" for="surgery_future_text">Detalle</label>
                <input type="text" name="surgery_future_text" id="surgery_future_text" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->health[0]->surgery_future_text); ?>">
            </div>
            <div class="col-span-2">
                <label class="block font-semibold text-gray-500 mb-2" for="smoke">Fuma</label>
                <select name="smoke" id="smoke" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                    <option <?php echo e($data->affiliate->health[0]->smoke == '0' ? 'selected' : null); ?> value="0">NO</option>
                    <option <?php echo e($data->affiliate->health[0]->smoke == '1' ? 'selected' : null); ?> value="1">SI</option>
                </select>
            </div>
            <div class="col-span-2">
                <label class="block font-semibold text-gray-500 mb-2" for="sport">Deporte</label>
                <select name="sport" id="sport" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                    <option <?php echo e($data->affiliate->health[0]->sport == '0' ? 'selected' : null); ?> value="0">NO</option>
                    <option <?php echo e($data->affiliate->health[0]->sport == '1' ? 'selected' : null); ?> value="1">SI</option>
                </select>
            </div>
            <div class="col-span-2">
                <label class="block font-semibold text-gray-500 mb-2" for="motorcycle">Moto</label>
                <select name="motorcycle" id="motorcycle" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                    <option <?php echo e($data->affiliate->health[0]->motorcycle == '0' ? 'selected' : null); ?> value="0">NO</option>
                    <option <?php echo e($data->affiliate->health[0]->motorcycle == '1' ? 'selected' : null); ?> value="1">SI</option>
                </select>
            </div>
            <div class="col-span-2">
                <label class="block font-semibold text-gray-500 mb-2" for="routine">Rutina</label>
                <select name="routine" id="routine" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                    <option <?php echo e($data->affiliate->health[0]->routine == '0' ? 'selected' : null); ?> value="0">NO</option>
                    <option <?php echo e($data->affiliate->health[0]->routine == '1' ? 'selected' : null); ?> value="1">SI</option>
                </select>
            </div>
            <div class="col-span-4">
                <label class="block font-semibold text-gray-500 mb-2" for="routine_text">Cada (meses)</label>
                <input type="text" name="routine_text" id="routine_text" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->health[0]->routine_text); ?>">
            </div>
            <div class="col-span-3">
                <label class="block font-semibold text-gray-500 mb-2" for="height">Altura (cm)</label>
                <input type="number" name="height" id="height" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->health[0]->height); ?>">
            </div>
            <div class="col-span-3">
                <label class="block font-semibold text-gray-500 mb-2" for="weight">peso (Kg)</label>
                <input type="number" name="weight" id="weight" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->affiliate->health[0]->weight); ?>">
            </div>
        </div>
    </div>
    <button class="bg-primary font-semibold text-white rounded px-4 py-2" type="submit">Editar</button>
</form>
<div class="bg-white mt-4 rounded shadow overflow-hidden">
    <div class="bg-gray-200 font-semibold px-4 py-2">Archivos</div>
    <div class="px-4 py-6">
        <div class="grid grid-cols-5 gap-4">
            <?php $__currentLoopData = $data->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(Storage::url($item['value'])); ?>"><?php echo e($item['name'] ?: 'Desconocido'); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(count($data->files) <= 0): ?> <div>
                No se encontrarion archivos
        </div>
        <?php endif; ?>
    </div>
</div>
<div class="bg-gray-100 border-t px-4 pt-4 pb-8">
    <form action="<?php echo e(route('lrequest.update', ['loan' => $data->loan->id, $data])); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="grid grid-cols-3 items-end gap-4">
            <div class="">
                <label class="block font-semibold text-gray-500 mb-2" for="fname">Nombre</label>
                <input type="text" name="fname" id="fname" class="block border rounded-l px-4 py-2 w-full focus:outline-none" required>
            </div>
            <div class="">
                <label class="block font-semibold text-gray-500 mb-2" for="ffile">Archivo</label>
                <input type="file" name="ffile" id="ffile" class="block bg-white border rounded px-4 py-2 w-full focus:outline-none" required>
            </div>
            <div>
                <button class="bg-primary font-semibold text-white rounded px-4 py-2" type="submit">Subir</button>
            </div>
        </div>
    </form>
</div>
</div>
<div class="bg-white mt-4 rounded shadow overflow-hidden">
    <div class="bg-gray-200 font-semibold px-4 py-2">Remplazar Nro de expediente</div>
    <div class="px-4 py-6">
        <form action="<?php echo e(route('lrequest.update', ['loan' => $data->loan->id,$data])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="flex">
                <input type="text" name="expc" id="expc" class="block border rounded-l px-4 py-2 w-full focus:outline-none" value="<?php echo e($data->number); ?>">
                <button class="bg-primary font-semibold text-white rounded-r px-4 py-2" type="submit">Remplazar</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/loan/request-e.blade.php ENDPATH**/ ?>