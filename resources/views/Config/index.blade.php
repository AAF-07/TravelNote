@extends('layouts.app')
@section('content')
<form method="post" action="{{ url('/') }}" class="items-center margin-top-10">
    @csrf
    <div>
        <div class="flex"><label class="mr-0">NIK</label></div>
        <input name="nik" type="text" class="border p-1 w-full"/>
    </div>
    <div class="mt-2">
        <div class="flex"><label class="mr-0">Nama</label></div>
        <input name="nama"  type="text"  class="border p-1 w-full"/>
    </div>
    <div class="mt-3">
        <button type="submit"  class="px-5 py-1 border">login</button>
    </div>
</form>
@endsection
