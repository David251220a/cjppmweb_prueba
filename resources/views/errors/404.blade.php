@extends('layouts.www')

@section('main')
<section>
    <div class="container py-16">
        <div class="content font-semibold text-center">
            <img class="mx-auto mb-10" src="{{ Storage::url('e404.png') }}" alt="" />
            <div class="text-gray-500 text-2xl mb-6">Parece que ha habido un error con la página que estabas buscando.<br />Es posible que la entrada haya sido eliminada o que la dirección no exista.</div>
        </div>
    </div>
</section>
@endsection
