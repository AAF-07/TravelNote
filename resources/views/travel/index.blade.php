@extends('layouts.app')
@section('content')
<div>
    @foreach ($config as $config)
    <div>user: {{ $config['nik'] }} - {{ $config['name'] }}</div>
    @endforeach
    <a href="{{ route('travel.create') }}" class="inline-block mt-3 mb-3 border px-2 py-1">tambah catatan</a>
    
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
