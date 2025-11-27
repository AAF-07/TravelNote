@extends('layouts.app')
@section('content')
<form method="post" action="{{ url('/') }}">
    @csrf
    <div>
        <label>nik</label>
        <input name="nik" type="text" class="border p-1 w-full"/>
    </div>
    <div class="mt-2">
        <label>nama</label>
        <input name="nama"  type="text"  class="border p-1 w-full"/>
    </div>
    <div class="mt-3">
        <button type="submit"  class="px-3 py-1 border">login</button>
    </div>
</form>
@endsection
