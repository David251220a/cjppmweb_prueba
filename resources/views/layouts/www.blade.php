<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    {{-- INIT - Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    {{-- END - Google Fonts --}}
    {{-- INIT - Laravel link --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- END - Laravel link --}}
    {{-- INIT - Google Analytics --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-P7ZH40XB77"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());
        gtag("config", "G-P7ZH40XB77");
    </script>
    {{-- END - Google Analytics --}}
</head>

<body>
    {{-- HEADER --}}
    <header class="shadow-lg" x-data="{ show: false }">
        <div class="container py-4">
            <div class="flex items-center justify-between">
                <div>
                    <a href="{{ route('home') }}">
                        <img src="{{ Storage::url('logo.png') }}" class="h-10 md:h-16" alt="">
                    </a>
                </div>
                <div class="block md:hidden border border-primary cursor-pointer rounded text-primary px-4 py-2" @click="show = !show"><i class="fas fa-bars"></i></div>
                <div class="hidden md:block">
                    <a class="flex items-center space-x-4 bg-primary cursor-pointer text-white rounded shadow px-4 py-2" href="{{ route('portal') }}">
                        <img src="{{ Storage::url('/iconos/portal.png') }}" class="w-10" alt="">
                        <div>
                            <p class="font-semibold text-sm">Portal de</p>
                            <p class="font-bold text-lg uppercase">Autogestión</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <nav class="bg-dark font-semibold text-white relative">
            <div class="md:container">
                <div class="flex justify-between">
                    <div class="hidden md:flex flex-row">
                        <a class="block px-4 py-3 hover:bg-primary" href="{{ route('home') }}">Inicio</a>
                        <a class="block px-4 py-3 hover:bg-primary" href="{{ route('institutional') }}">Institucional</a>
                        <a class="block px-4 py-3 hover:bg-primary" href="{{ route('institutional.authorities') }}">Autoridades</a>
                        <a class="block px-4 py-3 hover:bg-primary" href="{{ route('institutional.departments') }}">Direcciones</a>
                        <a class="block px-4 py-3 hover:bg-primary" href="{{ route('institutional.history') }}">Historia</a>
                        <a class="block px-4 py-3 hover:bg-primary" href="{{ route('institutional.social') }}">Sede Social</a>
                        <a class="block px-4 py-3 hover:bg-primary" href="{{ route('institutional.medical') }}">Servicio Médico</a>
                        <a class="block px-4 py-3 hover:bg-primary" href="{{ route('wnews') }}">Noticias</a>
                        <a class="block px-4 py-3 hover:bg-primary" href="{{ route('wley5189') }}">Ley 5189</a>
                        <a class="block px-4 py-3 hover:bg-primary" href="{{ route('contact') }}">Contáctanos</a>
                    </div>

                </div>
            </div>
        </nav>
    </header>

    {{-- MAIN --}}
    <main>
        @yield('main')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-dark border-t-8 border-primary text-white pt-14">
        <div class="container">
            <div class="grid md:grid-cols-3 gap-x-8 mb-14">
                <div class="mb-8 md:mb-0">
                    <h3 class="font-bold uppercase mb-2">CJPPM</h3>
                    <div class="bg-white h-1 w-10 mb-4"></div>
                    <p class="mb-1">Benjamin Constant 955 c/ Colon y Montevideo</p>
                    <p class="mb-2">Asunción - Paraguay</p>
                    <p class="mb-4">
                        <a class="block border border-white rounded my-4 px-4 py-2 md:inline-block md:border-0 md:p-0 md:m-0" target="_blank" rel="noreferrer" href="https://www.google.com.py/maps/place/Caja+De+Jubilaciones+y+Pensiones+del+Personal+Municipal/@-25.2771957,-57.6418309,17z/data=!3m1!4b1!4m5!3m4!1s0x945da78b6ed8125d:0x378dde5fd35011a1!8m2!3d-25.2771957!4d-57.6396422?hl=es-419">
                            <i class="fas fa-map-marked-alt mr-2"></i> Ver Ubicación en GoogleMap
                        </a>
                    </p>
                    <p class="mb-4">
                        <a class="block border border-white rounded my-4 px-4 py-2 md:inline-block md:border-0 md:p-0 md:m-0" target="_blank" rel="noreferrer" href="http://wa.me/595974976599">
                            <i class="fab fa-whatsapp mr-1"></i> +595 (974) 976-599
                        </a>
                    </p>
                    <p class="hidden mb-2 md:block">
                        <i class="fas fa-phone mr-1"></i> (021) 497-189 / 496-473
                    </p>
                    <div class="md:hidden">
                        <a class="block border border-white rounded my-4 px-4 py-2 md:inline-block md:border-0 md:p-0 md:m-0" target="_blank" rel="noreferrer" href="tel:021497189">
                            <i class="fas fa-phone-alt mr-2"></i> Llamar al (021) 497-189
                        </a>
                        <a class="block border border-white rounded my-4 px-4 py-2 md:inline-block md:border-0 md:p-0 md:m-0" target="_blank" rel="noreferrer" href="tel:021496473">
                            <i class="fas fa-phone-alt mr-2"></i> Llamar al (021) 496-473
                        </a>
                    </div>
                </div>
                <div class="mb-8 md:mb-0">
                    <h3 class="font-bold uppercase mb-2">Links de Interés</h3>
                    <div class="bg-white h-1 w-10 mb-4"></div>
                    <ul>
                        <li class="mb-2"><a target="_blank" rel="noreferrer" href="https://www.hacienda.gov.py/">Ministerio de Hacienda</a></li>
                        <li class="mb-2"><a target="_blank" rel="noreferrer" href="http://www.ministeriodejusticia.gov.py/">Ministerio de Justicia</a></li>
                        <li class="mb-2"><a target="_blank" rel="noreferrer" href="http://www.ips.gov.py/">Instituto de Previsión Social (IPS)</a></li>
                    </ul>
                </div>
                <div class="mb-8 md:mb-0">
                    <h3 class="font-bold uppercase mb-2">Redes sociales</h3>
                    <div class="bg-white h-1 w-10 mb-4"></div>
                    <div>
                        <a target="_blank" rel="noreferrer" class="text-2xl hover:text-green-200" href="https://www.facebook.com/CJPPMPY/">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a target="_blank" rel="noreferrer" class="text-2xl ml-6 hover:text-green-200" href="https://www.instagram.com/cjppm20">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a target="_blank" rel="noreferrer" class="text-2xl ml-6 hover:text-green-200" href="https://twitter.com/CajaMunicipalPy">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a target="_blank" rel="noreferrer" class="text-2xl ml-6 hover:text-green-200" href="https://www.youtube.com/channel/UCA-PBAR_V8GLAM7_TEIEPeA">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-black bg-opacity-20 py-4">
            <div class="container">
                <div class="flex items-center justify-between font-semibold text-xs">
                    <div class="leading-5">
                        © {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados
                    </div>
                    <div class="hidden md:block">
                        <ul class="flex items-center gap-4 list-none">
                            <li><a class="text-green-200 hover:text-primary" href="{{ route('home') }}">Inicio</a></li>
                            <li><a class="text-green-200 hover:text-primary" href="{{ route('institutional') }}">Institucional</a></li>
                            <li><a class="text-green-200 hover:text-primary" href="{{ route('wnews') }}">Noticias</a></li>
                            <li><a class="text-green-200 hover:text-primary" href="{{ route('contact') }}">Contáctanos</a></li>
                            <li><a class="text-green-200 hover:text-primary" href="{{ route('portal') }}">Portal de Autogestión</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
