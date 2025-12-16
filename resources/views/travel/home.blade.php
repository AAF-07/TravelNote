@extends('layouts.nav')
@section('content')
<div class="text-center">
    <h2 class="text-2xl font-semibold mb-2">
        selamat datang, {{ $config['name'] }}
    </h2>

    <p class="text-gray-600 mb-6">
        ini adalah aplikasi catatan perjalanan sederhana.<br>
        dapat mencatat perjalanan, mengedit, dan menghapus data perjalananmu.
    </p>

    <div class="flex justify-center gap-4">
        <a href="/travel" class="bg-blue-500 text-white px-5 py-2 rounded hover:bg-blue-600">
            lihat catatan
        </a>

        <a href="/travel/create" class="bg-green-500 text-white px-5 py-2 rounded hover:bg-green-600">
            tambah catatan
        </a>
    </div>
</div>
@endsection
