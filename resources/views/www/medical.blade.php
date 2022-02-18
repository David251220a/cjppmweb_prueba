@extends('layouts.www')

@section('main')
<section class="py-8 md:py-16">
    <div class="container px-4">
        <div class="title mb-10">
            <h1 class="font-bold text-gray-700 text-2xl mb-3 md:text-4xl">Servicio Médico</h1>
            <div class="bg-primary h-1 w-20"></div>
        </div>
        <div class="content">
            <p class="text-lg mb-8">Atención gratuita de Lunes a Viernes de 7:00 a 14:00 por orden de llegada</p>
            <p class="text-yellow-600 font-bold text-4xl mb-10">
                <i class="fas fa-phone-volume mr-3"></i>
                <span class="mr-4">(021) 44 71 32</span>
                <span class="block mt-4 md:inline-block md:mt-0">Interno 360</span>
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <p class="text-primary font-bold text-2xl uppercase mb-4">Cardiología</p>
                    <p class="font-semibold text-lg">Dr. Silvio Rodas</p>
                    <p class="text-gray-500 font-semibold">Miercoles y Viernes</p>
                    <p class="text-gray-500">7:00 a 9:00 hs</p>
                </div>
                <div>
                    <p class="text-primary font-bold text-2xl uppercase mb-4">Uroginecologia</p>
                    <p class="font-semibold text-lg">Dr. Juan Martinez</p>
                    <p class="text-gray-500 font-semibold">Lunes</p>
                    <p class="text-gray-500">7:00 a 12:00 hs</p>
                </div>
                <div>
                    <p class="text-primary font-bold text-2xl uppercase mb-4">Odontología</p>
                    <p class="font-semibold text-lg">Dr. Fausto Bejanaro</p>
                    <p class="text-gray-500 font-semibold">Martes y Jueves</p>
                    <p class="text-gray-500">8:00 a 12:00 hs</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-gray-100 py-10 md:py-24">
    <div class="container px-4">
        <div class="grid md:grid-cols-2 items-center gap-8">
            <div>
                <div class="title mb-10">
                    <h1 class="font-bold text-gray-700 text-2xl mb-3 md:text-4xl">Servicio de Ambulancia</h1>
                    <div class="bg-primary h-1 w-20"></div>
                </div>
                <ul class="list-disc md:text-2xl pl-4 font-semibold text-primary my-10">
                    <li class="mb-2">Para afiliados activos, jubilados y pensionados</li>
                    <li class="mb-2">Cobertura para padres e hijos del titular</li>
                    <li class="mb-2">Servicio de translado y urgencias domiciliarias</li>
                </ul>
                <p class="text-yellow-600 font-bold text-4xl">
                    <i class="fas fa-phone-volume mr-3"></i>
                    (021) 56 10 00
                </p>
            </div>
            <div>
                <div class="bg-white rounded-lg shadow py-4 md:py-10">
                    <img src="http://www.sasa.com.py/images/logo.jpg" class="m-auto" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
