@extends('layouts.app')
@section('content')
<form action="{{ route('profile.photo') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-3">

    @csrf

    <!-- preview PP -->
    <img src="{{ $user->photo ? asset('storage/'.$user->photo) : asset('images/default-pp.png') }}" class="w-10 h-10 rounded-full object-cover border">

    <input type="file" name="photo" class="text-sm" required>

    <button type="submit"
            class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
        upload
    </button>
</form>

@endsection
