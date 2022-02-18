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
    <div class="bg-dark min-h-screen">
        <div class="container">
            <div class="flex justify-center py-16">
                <div class="w-full md:w-2/3 lg:w-1/3">
                    {{-- LOGO --}}
                    <a href="{{ route('home') }}">
                        <img src="{{ Storage::url('logo-icon-light.svg') }}" class="h-28 mx-auto mb-10" alt="">
                    </a>

                    {{-- MENSAJE Y ALERTA --}}
                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-200 font-semibold text-red-900 text-sm rounded px-4 py-3 mb-6">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(session()->has('message'))
                    <div class="bg-green-100 border border-green-200 font-semibold text-green-900 text-sm rounded px-4 py-3 mb-6">
                        {{ session()->get('message') }}
                    </div>
                    @endif

                    {{-- MAIN --}}
                    <div class="rounded shadow-sm overflow-hidden" style="font-family: Arial, Helvetica, sans-serif">
                        <div class="bg-white px-4 py-6">
                            <div class="mb-6">
                                <h1 class="font-extrabold text-gray-700 uppercase mb-2">@yield('title')</h1>
                                @hasSection('message')
                                <p class="font-semibold text-gray-500">@yield('message')</p>
                                @endif
                            </div>
                            @hasSection('main')
                            @yield('main')
                            @else
                            <a class="block bg-primary font-semibold text-white text-center uppercase rounded shadow px-4 py-3 w-full" href="{{ url()->previous() }}">Aceptar</a>
                            @endif
                        </div>
                        <div class="bg-gray-100 border-t text-xs text-gray-600 px-4 py-3">
                            <i class="fas fa-network-wired mr-1"></i> {{ request()->ip() }}
                            @auth
                            <i class="fas fa-user mr-1"></i> {{ auth()->user()->username }}
                            @endauth
                        </div>
                    </div>
                    @yield('footer')
                </div>
            </div>
        </div>
    </div>
    @yield('scripts')
</body>

</html>
