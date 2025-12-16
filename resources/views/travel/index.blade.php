@extends('layouts.nav')
@section('content')
<div>

    <div class="flex">
        <a href="{{ route('travel.create') }}" class="inline-block mt-3 mb-3 border px-2 py-1 ml-0">tambah catatan</a>
    </div>

    <table class="w-full border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">tanggal</th>
                <th class="p-2 border">lokasi</th>
                <th class="p-2 border">keterangan</th>
                <th class="p-2 border">aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="hover:bg-gray-50">
            @forelse($rows as $r)
            <tr class="border-t text-center">
                <td>{{ $r['date'] }}</td>
                <td>{{ $r['location'] }}</td>
                <td>{{ $r['description'] }}</td>
                <td>
                <a href="{{ route('travel.edit', $r['id']) }}" class="border px-2 py-1 shadow">edit</a>
                <form method="post" action="{{ route('travel.destroy', $r['id']) }}" style="display:inline">
                    @csrf
                    <button type="submit" onclick="return confirm('hapus?')" class="border px-2 py-1 shadow">hapus</button>
                </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">belum ada catatan</td></tr>
        @endforelse
            </tr>
        </tbody>
    </table>
</div>
@endsection
