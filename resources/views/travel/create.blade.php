@extends('layouts.app')

@section('content')

<h2 class="text-xl font-semibold mb-4">tambah catatan perjalanan</h2>

<form method="post" action="{{ route('travel.store') }}">
    @csrf

    <div class="mb-3">
        <label class="block mb-1">tanggal</label>
        <input type="date" name="date" class="border p-2 w-full" required>
    </div>

    <div class="mb-3">
        <label class="block mb-1">lokasi</label>
        <input type="text" name="location" class="border p-2 w-full" required>
    </div>

    <div class="mb-3">
        <label class="block mb-1">keterangan</label>
        <textarea name="description" class="border p-2 w-full" rows="3" required></textarea>
    </div>

    <div class="mt-4 flex gap-3">
        <button  type="submit" class="px-4 py-2 border">simpan</button>
        <a href="{{ route('travel.index') }}" class="px-4 py-2 border">kembali</a>
    </div>

</form>

@endsection
