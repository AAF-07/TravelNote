<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>travel notes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="flex items-start gap-4 mb-6 max-w-3xl mx-auto mt-20">
        <div>
            <form id="photoForm"
                action="{{ route('profile.photo') }}"
                method="POST"
                enctype="multipart/form-data">

            @csrf

                <label for="photoInput" class="cursor-pointer">
                    <img src="{{ $config->photo ? asset('storage/'.$config->photo) : asset('images/default-pp.jpg') }}" class="w-20 h-20 border object-cover">
                </label>
            
                <input type="file"
                    id="photoInput"
                    name="photo"
                    class="hidden"
                    onchange="document.getElementById('photoForm').submit()">
            </form>

        </div>
        <div >
            <img src="" alt="">
            <h1 class="text-2xl font-bold mb-4">Travel Notes</h1>
                <form action="{{ route('config.logout') }}" method="POST" >
                    <div>User: {{ $config['name'] }} | <button type="submit" class="text-red-600 hover:text-red-800">Logout</button></div>
                    @csrf
                </form>
            <p><a href="/home">Home</a> | <a href="/travel">Note</a></p>
        </div>
    </div>
    <div class="max-w-3xl mx-auto text-center mt-5 shadow-lg p-6 bg-gray-50">
            @if(session('success')) <div class="bg-green-100 p-2 mb-2">{{ session('success') }}</div> @endif
            @if(session('error')) <div class="bg-red-100 p-2 mb-2">{{ session('error') }}</div> @endif
            @yield('content')
    </div>

</body>
</html>
