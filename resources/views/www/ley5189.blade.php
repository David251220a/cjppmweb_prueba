@extends('layouts.www')

@section('main')
<section class="py-8 md:py-16">
    <div class="container px-4">
        <div class="title mb-10">
            <h1 class="font-bold text-gray-700 text-2xl mb-3 md:text-4xl">{{ !empty($data->items) ? $data->name : 'Ley 5189' }}</h1>
            <div class="bg-primary h-1 w-20"></div>
            @if(empty($data->items))
            <p class="font-semibold text-lg text-gray-500 mt-4 mb-10">En el cumplimiento de lo dispuesto en la ley 5189/14, «que establece la obligatoriedad de la provisión de informaciones en el uso de los recursos públicos sobre remuneraciones y otras retribuciones asignadas al servidor publico de la república del paraguay»,</p>
            @endif
        </div>
        <div>
            {{-- LISTAR ARCHIVOS DE X DOCUMENTO --}}
            @if (!empty($data->items))
            <div>
                @foreach ($data->items as $item)
                {{-- TITULO AÑO --}}
                @if (@$i != $item->year)
                <h1 class="bg-gray-50 border font-bold text-gray-600 text-xl rounded shadow-sm mb-6 p-4">PERIODO {{ $item->year }}</h1>
                @php
                $i = $item->year;
                @endphp
                @endif
                {{-- LINK ARCHIVO --}}
                @if ($item->year == $i)
                <div class="inline-block -mr-1 mb-6 w-full md:w-1/4">
                    <a href="{{ Storage::url($item->file) }}" class="block bg-green-50 border border-green-200 font-bold text-green-900 text-center rounded tracking-wide mx-2 p-6" target="_blank">
                        <i class="far fa-file-pdf text-green-900 text-4xl"></i>
                        <span class="block mt-2">{{ Str::upper($month[$item->month]) }}</span>
                    </a>
                </div>
                @endif
                @endforeach
            </div>
            {{-- LISTAR LOS DOCUMENTOS --}}
            @else
            <ul>
                @foreach ($data as $item)
                <li class="font-bold uppercase mb-4"><a href="{{ route('wley5189', @$item->slug) }}"><i class="fas fa-circle text-secondary mr-2"></i> {{ @$item->name }}</a></li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
</section>
@endsection
