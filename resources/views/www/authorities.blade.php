@extends('layouts.www')

@section('main')
<section class="py-8 md:py-16">
    <div class="container px-4">
        <div class="title mb-10">
            <h1 class="font-bold text-gray-700 text-2xl mb-3 md:text-4xl">Autoridades</h1>
            <div class="bg-primary h-1 w-20"></div>
        </div>
        <div class="content">
            <h3 class="font-bold text-primary text-2xl uppercase mb-10">Presidencia</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="mb-6">
                    <img src="{{ Storage::url('fotos/5175828875af6ceb16249dd1e8964585.jpg') }}" class="float-left border rounded-full shadow h-32 w-32 p-1 mr-7" alt="" />
                    <div class="flex flex-col items-start justify-center h-full">
                        <h3 class="font-bold text-xl">Bernabé Peralta Antúnez</h3>
                        <p class="text-gray-500 font-semibold">Presidente</p>
                    </div>
                </div>
            </div>
            <h3 class="font-bold text-primary text-2xl uppercase my-10">Miembros</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="mb-6">
                    <img src="{{ Storage::url('fotos/65f2f68348ac78f20db2ce5aecabe676.jpg') }}" class="float-left border rounded-full shadow h-32 w-32 p-1 mr-7" alt="" />
                    <div class="flex flex-col items-start justify-center h-full">
                        <h3 class="font-bold text-xl">Luis Alberto Caballero Candia</h3>
                        <p class="text-gray-500 font-semibold">Sector Jubilados</p>
                    </div>
                </div>
                <div class="mb-6">
                    <img src="{{ Storage::url('fotos/d50dd3dde569891fc09dbcca3bc064e9.jpg') }}" class="float-left border rounded-full shadow h-32 w-32 p-1 mr-7" alt="" />
                    <div class="flex flex-col items-start justify-center h-full">
                        <h3 class="font-bold text-xl">René Medina</h3>
                        <p class="text-gray-500 font-semibold">Sector de Afiliados Activos</p>
                    </div>
                </div>
                <div class="mb-6">
                    <img src="{{ Storage::url('fotos/8408c36e2f2f45efeacb92558d48947b.jpg') }}" class="float-left border rounded-full shadow h-32 w-32 p-1 mr-7" alt="" />
                    <div class="flex flex-col items-start justify-center h-full">
                        <h3 class="font-bold text-xl">Juan Amarilla</h3>
                        <p class="text-gray-500 font-semibold">Sector de Afiliados Activos</p>
                    </div>
                </div>
                <div class="mb-6">
                    <img src="{{ Storage::url('fotos/691e5ed33e6abb5f36a25b5d542814fd.jpg') }}" class="float-left border rounded-full shadow h-32 w-32 p-1 mr-7" alt="" />
                    <div class="flex flex-col items-start justify-center h-full">
                        <h3 class="font-bold text-xl">Viviana Brioschi Capurro</h3>
                        <p class="text-gray-500 font-semibold">Sector de Instituciones</p>
                    </div>
                </div>
                <div class="mb-6">
                    <img src="{{ Storage::url('fotos/1b96cb0573a65c62b685b8f156668b8b.jpg') }}" class="float-left border rounded-full shadow h-32 w-32 p-1 mr-7" alt="" />
                    <div class="flex flex-col items-start justify-center h-full">
                        <h3 class="font-bold text-xl">Venancio Díaz Escobar</h3>
                        <p class="text-gray-500 font-semibold">Sector de Instituciones</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
