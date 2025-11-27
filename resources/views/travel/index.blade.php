@extends('layouts.app')
@section('content')
<div>
    @foreach ($config as $config)
    <div class="flex justify-between items-center mb-3">
        <div>user: {{ $config['nik'] }} - {{ $config['name'] }}</div>
        <form action="{{ route('config.logout') }}" method="POST" >
            @csrf
            <button type="submit" class="px-4 py-2 border bg-red-600 text-white">Logout</button>
        </form>
    </div>
    @endforeach
    <div class="flex">
        <a href="{{ route('travel.create') }}" class="inline-block mt-3 mb-3 border px-2 py-1 ml-0">tambah catatan</a>
    </div>

    <table class="w-full border">
        <thead><tr><th>id</th><th>tanggal</th><th>lokasi</th><th>keterangan</th><th>aksi</th></tr></thead>
        <tbody>
        @forelse($rows as $r)
            <tr class="border-t text-center">
                <td>{{ $r['id'] }}</td>
                <td>{{ $r['date'] }}</td>
                <td>{{ $r['location'] }}</td>
                <td>{{ $r['description'] }}</td>
                <td>
                <a href="{{ route('travel.edit', $r['id']) }}">edit</a>
                <form method="post" action="{{ route('travel.destroy', $r['id']) }}" style="display:inline">
                    @csrf
                    <button type="submit" onclick="return confirm('hapus?')">hapus</button>
                </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">belum ada catatan</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
