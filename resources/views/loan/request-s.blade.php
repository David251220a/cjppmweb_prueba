@extends('layouts.app')

@section('title', 'Estado del expediente '. $lrequest->loan->exp . ($lrequest->passive == '1' ? $lrequest->loan->exp_passive : $lrequest->loan->exp_active) . 100000 + $lrequest->number)

@section('main')
<form action="" method="POST">
    @csrf
    <div>
        <label class="block font-semibold text-gray-500 mb-2" for="status_id">Estado</label>
        <select name="status_id" id="status_id" class="block border rounded px-4 py-2 w-full focus:outline-none" required>
            @foreach ($status as $item)
            <option {{ $lrequest->status->id == $item->id ? 'selected' : null }} value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="bg-primary font-semibold text-white rounded mt-4 px-4 py-2" type="submit">Editar</button>
</form>
@endsection
