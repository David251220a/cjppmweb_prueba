<?php $__env->startSection('title', 'Solicitar préstamos'); ?>

<?php $__env->startSection('main'); ?>
<div class="bg-blue-100 border border-blue-200 font-semibold text-blue-900 text-sm rounded px-4 py-3 mb-6">
    Tu limite para un prestamo es de <?php echo e(number_format($capacity['available'] - ($capacity['loan'] + $capacity['loan_defaulter']), 0,'','.')); ?> Gs.
</div>

<div>
    <form action="" method="post">
        <?php echo csrf_field(); ?>
        <div class="bg-white rounded overflow-hidden shadow mb-4">
            <div class="bg-gray-200 font-semibold px-4 py-2">Prestamo solicitado</div>
            <div class="grid md:grid-cols-4 gap-4 px-4 py-6">
                <div class="mb-4">
                    <label class="block font-semibold text-gray-500 mb-2" for="amount">Monto Solicitado Gs</label>
                    <input type="text" name="amount" id="amount" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold text-gray-500 mb-2" for="time">Plazo del Prestamo (meses)</label>
                    <select name="time" id="time" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                        <?php for($i = 1; $i <= 36; $i++): ?> <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option><?php endfor; ?>
                    </select>
                </div>
                <div>
                    <label class="block font-semibold text-gray-500 mb-2" for="loan">Destino o Aplicacion del Prestamo</label>
                    <select name="loan" id="loan" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                        <?php $__currentLoopData = $loan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item['id']); ?>"><?php echo e($item['name']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block font-semibold text-gray-500 mb-2" for="previous">Ya saco prestamo de la caja anteriormente?</label>
                    <select name="previous" id="previous" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="bg-white rounded overflow-hidden shadow mb-4">
            <div class="bg-gray-200 font-semibold px-4 py-2">Dato Laboral</div>
            <div class="grid md:grid-cols-5 gap-4 px-4 py-6">
                <div>
                    <label class="block font-semibold text-gray-500 mb-2" for="municipality">Lugar de trabajo</label>
                    <input type="text" name="municipality" id="municipality" class="block border rounded px-4 py-2 w-full focus:outline-none" disabled value="<?php echo e(@Auth::user()->affiliate->municipality->name); ?>" required>
                </div>
                <div>
                    <label class="block font-semibold text-gray-500 mb-2" for="position">Cargo</label>
                    <input type="text" name="position" id="position" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->job[0]->position); ?>" required>
                </div>
                <div>
                    <label class="block font-semibold text-gray-500 mb-2" for="dependence">Dependencia</label>
                    <input type="text" name="dependence" id="dependence" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->job[0]->dependence); ?>" required>
                </div>
                <div>
                    <label class="block font-semibold text-gray-500 mb-2" for="phone">Telefono</label>
                    <input type="text" name="phone" id="phone" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->job[0]->phone); ?>" required>
                </div>
                <div>
                    <label class="block font-semibold text-gray-500 mb-2" for="salary">Renumeracion Gs</label>
                    <input type="text" name="salary" id="salary" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->job[0]->salary); ?>" required>
                </div>
            </div>
        </div>

        <div class="bg-white rounded overflow-hidden shadow mb-4">
            <div class="bg-gray-200 font-semibold px-4 py-2">Referencia Personales</div>
            <div class="grid md:grid-cols-3 gap-4 px-4 py-6">
                <div>
                    <label class="block font-semibold text-gray-500 mb-2" for="ref1name">Nombre 1</label>
                    <input type="text" name="ref1name" id="ref1name" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->reference[0]->name); ?>" required>
                </div>
                <div>
                    <label class="block font-semibold text-gray-500 mb-2" for="ref1address">Direccion 1</label>
                    <input type="text" name="ref1address" id="ref1address" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->reference[0]->address); ?>" required>
                </div>
                <div>
                    <label class="block font-semibold text-gray-500 mb-2" for="ref1phone">Telefono 1</label>
                    <input type="text" name="ref1phone" id="ref1phone" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->reference[0]->phone); ?>" required>
                </div>
                <div>
                    <label class="block font-semibold text-gray-500 mb-2" for="ref2name">Nombre 2</label>
                    <input type="text" name="ref2name" id="ref2name" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->reference[1]->name); ?>" required>
                </div>
                <div>
                    <label class="block font-semibold text-gray-500 mb-2" for="ref2address">Direccion 2</label>
                    <input type="text" name="ref2address" id="ref2address" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->reference[1]->address); ?>" required>
                </div>
                <div>
                    <label class="block font-semibold text-gray-500 mb-2" for="ref2phone">Telefono 2</label>
                    <input type="text" name="ref2phone" id="ref2phone" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->reference[1]->phone); ?>" required>
                </div>
            </div>
        </div>

        <div class="bg-white rounded overflow-hidden shadow mb-4">
            <div class="bg-gray-200 font-semibold px-4 py-2">Direccion</div>
            <div class="grid md:grid-cols-3 gap-4 px-4 py-6">
                <div>
                    <label class="block font-semibold text-gray-500 mb-2" for="address">Direccion</label>
                    <input type="text" name="address" id="address" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->address[0]->address); ?>" required>
                </div>
                <div>
                    <label class="block font-semibold text-gray-500 mb-2" for="city">Ciudad</label>
                    <input type="text" name="city" id="city" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->address[0]->city); ?>" required>
                </div>
                <div>
                    <label class="block font-semibold text-gray-500 mb-2" for="neighborhood">Barrio</label>
                    <input type="text" name="neighborhood" id="neighborhood" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->address[0]->neighborhood); ?>" required>
                </div>
            </div>
        </div>

        <div class="bg-white rounded overflow-hidden shadow mb-4">
            <div class="bg-gray-200 font-semibold px-4 py-2">Estado de Salud</div>
            <div class="grid md:grid-cols-6 gap-4 px-4 py-6">
                <div class="col-span-2">
                    <label class="block font-semibold text-gray-500 mb-2" for="disease">Enfermedad</label>
                    <select name="disease" id="disease" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                        <option <?php echo e(@Auth::user()->affiliate->health[0]->disease == '0' ? 'selected' : null); ?> value="0">NO</option>
                        <option <?php echo e(@Auth::user()->affiliate->health[0]->disease == '1' ? 'selected' : null); ?> value="1">SI</option>
                    </select>
                </div>
                <div class="col-span-4">
                    <label class="block font-semibold text-gray-500 mb-2" for="disease_text">Detalle</label>
                    <input type="text" name="disease_text" id="disease_text" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->health[0]->disease_text); ?>">
                </div>
                <div class="col-span-2">
                    <label class="block font-semibold text-gray-500 mb-2" for="surgery">Cirugia</label>
                    <select name="surgery" id="surgery" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                        <option <?php echo e(@Auth::user()->affiliate->health[0]->surgery == '0' ? 'selected' : null); ?> value="0">NO</option>
                        <option <?php echo e(@Auth::user()->affiliate->health[0]->surgery == '1' ? 'selected' : null); ?> value="1">SI</option>
                    </select>
                </div>
                <div class="col-span-4">
                    <label class="block font-semibold text-gray-500 mb-2" for="surgery_text">Detalle</label>
                    <input type="text" name="surgery_text" id="surgery_text" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->health[0]->surgery_text); ?>">
                </div>
                <div class="col-span-2">
                    <label class="block font-semibold text-gray-500 mb-2" for="surgery_future">Cirugia Futura</label>
                    <select name="surgery_future" id="surgery_future" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                        <option <?php echo e(@Auth::user()->affiliate->health[0]->surgery_future == '0' ? 'selected' : null); ?> value="0">NO</option>
                        <option <?php echo e(@Auth::user()->affiliate->health[0]->surgery_future == '1' ? 'selected' : null); ?> value="1">SI</option>
                    </select>
                </div>
                <div class="col-span-4">
                    <label class="block font-semibold text-gray-500 mb-2" for="surgery_future_text">Detalle</label>
                    <input type="text" name="surgery_future_text" id="surgery_future_text" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->health[0]->surgery_future_text); ?>">
                </div>
                <div class="col-span-2">
                    <label class="block font-semibold text-gray-500 mb-2" for="smoke">Fuma</label>
                    <select name="smoke" id="smoke" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                        <option <?php echo e(@Auth::user()->affiliate->health[0]->smoke == '0' ? 'selected' : null); ?> value="0">NO</option>
                        <option <?php echo e(@Auth::user()->affiliate->health[0]->smoke == '1' ? 'selected' : null); ?> value="1">SI</option>
                    </select>
                </div>
                <div class="col-span-2">
                    <label class="block font-semibold text-gray-500 mb-2" for="sport">Deporte</label>
                    <select name="sport" id="sport" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                        <option <?php echo e(@Auth::user()->affiliate->health[0]->sport == '0' ? 'selected' : null); ?> value="0">NO</option>
                        <option <?php echo e(@Auth::user()->affiliate->health[0]->sport == '1' ? 'selected' : null); ?> value="1">SI</option>
                    </select>
                </div>
                <div class="col-span-2">
                    <label class="block font-semibold text-gray-500 mb-2" for="motorcycle">Moto</label>
                    <select name="motorcycle" id="motorcycle" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                        <option <?php echo e(@Auth::user()->affiliate->health[0]->motorcycle == '0' ? 'selected' : null); ?> value="0">NO</option>
                        <option <?php echo e(@Auth::user()->affiliate->health[0]->motorcycle == '1' ? 'selected' : null); ?> value="1">SI</option>
                    </select>
                </div>
                <div class="col-span-2">
                    <label class="block font-semibold text-gray-500 mb-2" for="routine">Rutina</label>
                    <select name="routine" id="routine" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
                        <option <?php echo e(@Auth::user()->affiliate->health[0]->routine == '0' ? 'selected' : null); ?> value="0">NO</option>
                        <option <?php echo e(@Auth::user()->affiliate->health[0]->routine == '1' ? 'selected' : null); ?> value="1">SI</option>
                    </select>
                </div>
                <div class="col-span-4">
                    <label class="block font-semibold text-gray-500 mb-2" for="routine_text">Cada (meses)</label>
                    <input type="text" name="routine_text" id="routine_text" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->health[0]->routine_text); ?>" required>
                </div>
                <div class="col-span-3">
                    <label class="block font-semibold text-gray-500 mb-2" for="height">Altura (cm)</label>
                    <input type="number" name="height" id="height" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->health[0]->height); ?>" required>
                </div>
                <div class="col-span-3">
                    <label class="block font-semibold text-gray-500 mb-2" for="weight">peso (Kg)</label>
                    <input type="number" name="weight" id="weight" class="block border rounded px-4 py-2 w-full focus:outline-none" value="<?php echo e(@Auth::user()->affiliate->health[0]->weight); ?>" required>
                </div>
            </div>
        </div>
        <button class="bg-primary font-semibold text-white rounded px-4 py-2 w-full" type="submit">Solicitar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cjppm_web\resources\views/prestamoNew.blade.php ENDPATH**/ ?>