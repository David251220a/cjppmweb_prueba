@extends('layouts.www')

@section('main')
<section class="py-16">
    <div class="container">
        <div class="grid lg:grid-cols-5 gap-8">
            <div class="md:col-span-4">
                <div class="md:border-r md:pr-8 md:col-span-4">
                    <div class="title mb-10">
                        <h1 class="font-bold text-gray-700 text-2xl mb-3 md:text-4xl">Últimas Noticias</h1>
                        <div class="bg-primary h-1 w-20"></div>
                    </div>
                    <div class="grid gap-6 my-6">
                        @foreach ($news as $item)
                        <a href="{{ route('wnews', $item->slug) }}">
                            <div class="flex gap-4">
                                <div class="text-primary text-2xl text-center"><i class="far fa-newspaper mx-auto"></i></div>
                                <div>
                                    <h3 class="font-semibold text-xl mb-1">{{ $item->title }}</h3>
                                    <p class="text-xs text-gray-400 mx-1">{{ date('d-m-Y', strtotime($item->created_at)) }}</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <a class="block md:inline-block bg-primary font-semibold text-center text-white rounded px-4 py-3 md:py-2" href="{{ route('wnews') }}"><i class="far fa-newspaper mr-2"></i>Ver más noticias</a>
                </div>
            </div>
            <div>
                {{-- Buscador --}}
                <div class="mb-6">
                    <form class="flex" action="">
                        <input type="text" name="search" id="search" class="flex-1 border rounded-l px-3 py-2 focus:outline-none" placeholder="Buscar..." />
                        <button type="submit" class="bg-dark text-white rounded-r px-4 focus:outline-none"><i class="fas fa-search"></i></button>
                    </form>
                </div>

                {{-- Redes sociales --}}
                <div class="flex space-x-4 mb-6">
                    <a target="_blank" rel="noreferrer" class="block bg-blue-800 text-white text-center text-lg rounded w-1/4 p-3" href="https://www.facebook.com/CJPPMPY/"><i class="fab fa-facebook"></i></a>
                    <a target="_blank" rel="noreferrer" class="block bg-pink-700 text-white text-center text-lg rounded w-1/4 p-3" href="https://www.instagram.com/cjppm20"><i class="fab fa-instagram"></i></a>
                    <a target="_blank" rel="noreferrer" class="block bg-blue-400 text-white text-center text-lg rounded w-1/4 p-3" href="https://twitter.com/CajaMunicipalPy"><i class="fab fa-twitter"></i></a>
                    <a target="_blank" rel="noreferrer" class="block bg-red-600 text-white text-center text-lg rounded w-1/4 p-3" href="https://www.youtube.com/channel/UCA-PBAR_V8GLAM7_TEIEPeA"><i class="fab fa-youtube"></i></a>
                </div>

                {{-- Portal --}}
                <a class="flex items-center space-x-4 bg-primary cursor-pointer text-white rounded shadow mb-6 p-4" href="/portal">
                    <img src="{{ Storage::url('iconos/portal.png') }}" class="w-10" alt="" />
                    <div>
                        <p class="font-semibold">Portal de</p>
                        <p class="font-bold text-xl uppercase">Autogestión</p>
                    </div>
                </a>

                {{-- Censo --}}
                <a class="flex items-center space-x-4 bg-gray-100 cursor-pointer rounded shadow mb-6 p-4" href="/portal/censo">
                    <img src="{{ Storage::url('iconos/censo.png') }}" class="w-10" alt="" />
                    <div>
                        <p class="font-semibold">Declaración Jurada</p>
                        <p class="font-bold text-blue-900 text-xl uppercase">Censo 2021</p>
                    </div>
                </a>

                {{-- Ley 5189 --}}
                <div class="rounded shadow overflow-hidden mb-10" x-data="{ show: false }">
                    <div class="flex items-stretch bg-gray-300 cursor-pointer" @click="show = !show">
                        <div class="w-1/6">
                            <div class="bg-red-500 text-red-500 h-1/3">&nbsp;</div>
                            <div class="bg-white text-white h-1/3">&nbsp;</div>
                            <div class="bg-blue-500 text-blue-500 h-1/3">&nbsp;</div>
                        </div>
                        <div class="flex-1 px-5 py-4">
                            <p class="font-black text-xl uppercase mb-1">Transparencia</p>
                            <p class="font-bold text-xl">LEY 5.189</p>
                        </div>
                    </div>
                    <ul class="bg-gray-100" x-show="show">
                        @foreach ($ley as $item)
                        <li><a class="block border-t text-gray-600 hover:bg-gray-200 px-4 py-2" href="{{ route('wley5189', $item->slug) }}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                 {{-- Ley 2991 --}}
                <a class="flex items-center space-x-4 bg-gray-100 cursor-pointer rounded shadow mb-6 p-4" href="{{ route('wley2991') }}">
                    <img src="{{ Storage::url('ley2991.jpg') }}" class="w-100" alt="" />
                </a>

                {{-- Contacto --}}
                <div class="text-center">
                    <a class="mb-4" href="{{ route('contact') }}">
                        <img class="mx-auto w-1/2 md:w-2/3" src="{{ Storage::url('iconos/call.png') }}" alt="">
                        <h3 class="font-bold text-dark uppercase my-1">Buzón de sugerencias</h3>
                        <p class="font-semibold">Queremos escucharte</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Sede Social --}}
<section class="bg-gray-50 py-24">
    <div class="container">
        <div class="text-center">
            <h2 class="font-bold text-gray-700 text-4xl mb-6">Sede Social</h2>
            <p class="text-xl text-gray-500 mb-12">Te ofrecemos un espacio recreativo para eventos sociales y deportivos, para compartir con tu familia y/o amigos</p>
        </div>
        <div class="grid md:grid-cols-4 gap-4 items-center">
            <div class="grid gap-4">
                <div class="relative rounded overflow-hidden">
                    <p class="absolute font-bold text-white md:text-lg left-2 bottom-2 z-10" style="text-shadow: 1px 1px 1px #333333">Cancha</p>
                    <img src="{{ Storage::url('fotos/social0.png') }}" alt="" />
                </div>
                <div class="relative rounded overflow-hidden">
                    <p class="absolute font-bold text-white md:text-lg left-2 bottom-2 z-10" style="text-shadow: 1px 1px 1px #333333">Pileta 1</p>
                    <img src="{{ Storage::url('fotos/social1.jpg') }}" alt="" />
                </div>
            </div>
            <div class="grid gap-4">
                <div class="relative rounded overflow-hidden">
                    <p class="absolute font-bold text-white md:text-lg left-2 bottom-2 z-10" style="text-shadow: 1px 1px 1px #333333">Pileta 3</p>
                    <img src="{{ Storage::url('fotos/social3.png') }}" alt="" />
                </div>
                <div class="relative rounded overflow-hidden">
                    <p class="absolute font-bold text-white md:text-lg left-2 bottom-2 z-10" style="text-shadow: 1px 1px 1px #333333">Pileta 2</p>
                    <img src="{{ Storage::url('fotos/social2.jpg') }}" alt="" />
                </div>
            </div>
            <div class="col-span-2">
                <div class="relative rounded overflow-hidden">
                    <p class="absolute font-bold text-white text-2xl left-4 bottom-4 z-10" style="text-shadow: 1px 1px 1px #333333">Quincho</p>
                    <img src="{{ Storage::url('fotos/social4.png') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
