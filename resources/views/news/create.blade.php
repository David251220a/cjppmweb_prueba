@extends('layouts.app')

@section('title', 'Crear noticia')

@section('main')
<form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="title">Titulo</label>
        <input type="text" name="title" id="title" class="block border rounded px-4 py-2 w-full focus:outline-none">
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="content">Contenido</label>
        <textarea name="content" id="content" class="block border rounded px-4 py-2 w-full focus:outline-none" cols="30" rows="10"></textarea>
    </div>
    <div class="mb-4">
        <label class="block font-semibold text-gray-500 mb-2" for="photo">Foto portada</label>
        <input type="file" name="photo" id="photo" class="block bg-white border rounded px-4 py-2 w-full focus:outline-none">
    </div>
    <button class="bg-primary font-semibold text-white rounded px-4 py-3" type="submit">Guardar</button>
</form>
@endsection

@section('scripts')
<script>
    tinymce.init({
      selector: 'textarea',
   });
</script>
@endsection
