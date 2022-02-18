@extends('layouts.www')

@section('main')
<section class="py-8 md:py-16">
    <div class="container px-4">
        <div class="title mb-10">
            <h1 class="font-bold text-gray-700 text-2xl mb-3 md:text-4xl">{{ @$data['id'] ? $data['title'] : 'Direcciones' }}</h1>
            <div class="bg-primary h-1 w-20"></div>
        </div>
        <div>
            {{-- VISUALIZAR DIRECCION --}}
            @if (@$data['id'])
            <div>
                @if (!empty($data['photo']))
                <img class="border p-1 mb-4 w-full" src="{{ Storage::url('fotos/' . $data['photo']) }}" alt="">
                @endif
                <p>{!! html_entity_decode($data['description']) !!}</p>
            </div>

            {{-- LISTAR DIRECCIONES --}}
            @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($data as $item)
                <a href="{{ route('institutional.departments', Str::replace(' ', '-', $item['title'])) }}">
                    <img src="{{ Storage::url('fotos/'.$item['photo']) }}" alt="" />
                    <div class="bg-primary font-semibold tracking-wider text-white text-center uppercase p-2">{{ $item->title }}</div>
                </a>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
