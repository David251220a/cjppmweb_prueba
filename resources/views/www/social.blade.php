@extends('layouts.www')

@section('main')
<section class="py-8 md:py-16">
    <div class="container px-4">
        <div class="title mb-10">
            <h1 class="font-bold text-gray-700 text-2xl mb-3 md:text-4xl">Sede Social y Deportiva</h1>
            <div class="bg-primary h-1 w-20"></div>
        </div>
        <div class="content font-semibold mb-14">
            <p class="mb-6">Los afiliados a la Caja Municipal tienen a su disposición un hermoso complejo para pasar el día rodeado de sus familiares y amigos. El local cuenta con cuatro piscinas, varios quinchos con parrillas, una cancha de fútbol de campo, otra para fútbol suizo, parque de recreaciones para niños, entre otras instalaciones.</p>
            <p class="mb-6">La Sede Social y Deportiva de la Caja Municipal se encuentra sobre la calle Víctor Cáceres casi Dr. Ramón Frizzola, barrio Villa Amelia de la ciudad de San Lorenzo (detrás de Toyotoshi).</p>
            <p class="mb-6">El predio abre sus puertas para los aportantes, jubilados y pensionados de martes a domingo, desde de las 10:00 hasta las 20:00. Cuenta con un amplio estacionamiento, además de personal de seguridad y salvavidas que controlan a los bañistas.</p>
        </div>
        <div class="grid md:grid-cols-4 gap-4 items-center">
            <div class="grid gap-4">
                <div class="relative rounded overflow-hidden">
                    <p class="absolute font-bold text-white md:text-lg left-2 bottom-2 z-10" style="text-shadow: 1px 1px 1px #333333">
                        Cancha
                    </p>
                    <img src="{{ Storage::url('fotos/social0.png') }}" alt="" />
                </div>
                <div class="relative rounded overflow-hidden">
                    <p class="absolute font-bold text-white md:text-lg left-2 bottom-2 z-10" style="text-shadow: 1px 1px 1px #333333">
                        Pileta 1
                    </p>
                    <img src="{{ Storage::url('fotos/social1.jpg') }}" alt="" />
                </div>
            </div>
            <div class="grid gap-4">
                <div class="relative rounded overflow-hidden">
                    <p class="absolute font-bold text-white md:text-lg left-2 bottom-2 z-10" style="text-shadow: 1px 1px 1px #333333">
                        Pileta 3
                    </p>
                    <img src="{{ Storage::url('fotos/social3.png') }}" alt="" />
                </div>
                <div class="relative rounded overflow-hidden">
                    <p class="absolute font-bold text-white md:text-lg left-2 bottom-2 z-10" style="text-shadow: 1px 1px 1px #333333">
                        Pileta 2
                    </p>
                    <img src="{{ Storage::url('fotos/social2.jpg') }}" alt="" />
                </div>
            </div>
            <div class="col-span-2">
                <div class="relative rounded overflow-hidden">
                    <p class="absolute font-bold text-white text-2xl left-4 bottom-4 z-10" style="text-shadow: 1px 1px 1px #333333">
                        Quincho
                    </p>
                    <img src="{{ Storage::url('fotos/social4.png') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
