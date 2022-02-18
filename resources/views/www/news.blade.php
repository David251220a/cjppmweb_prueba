@extends('layouts.www')

@section('main')
<section class="py-8 md:py-16">
    <div class="container px-4">
        <div class="title mb-10">
            <h1 class="font-bold text-gray-700 text-2xl mb-3 md:text-4xl">{{ @$data['id'] ? $data['title'] : 'Noticias' }}</h1>
            <div class="bg-primary h-1 w-20"></div>
            <p class="font-semibold text-gray-400 mt-2">{{ @$data['created_at'] }}</p>
        </div>
        <div>
            {{-- VISUALIZAR NOTICIA --}}
            @if (@$data['id'])
            <div>
                @if (!empty($data['photo']))
                <img class="border p-1 mb-4 w-full" src="{{ Storage::url($data['photo']) }}" alt="">
                @endif
                <p>{!! html_entity_decode($data->content) !!}</p>

            </div>

            {{-- LISTAR NOTICIAS --}}
            @else
            <div class="grid grid-cols-3 gap-8">
                @foreach ($data as $item)
                <a href="{{ route('wnews', $item->slug) }}">
                    <div class="border font-bold text-white rounded overflow-hidden">
                        <div class="bg-primary px-4 py-3">{{ $item['title'] }}</div>
                        <img class="w-full" src="{{ Storage::url($item['photo']) }}" alt="">
                        <div class="bg-gray-200 text-gray-400 text-sm px-4 py-2">
                            {{ $item->created_at->format('d-m-Y') }}
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
