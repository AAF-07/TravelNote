<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>travel notes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-6">
    <div class="max-w-3xl mx-auto text-center mt-10 shadow-lg p-6 bg-gray-50">
        <h1 class="text-2xl font-bold mb-4">Travel Notes</h1>
        @if(session('success')) <div class="bg-green-100 p-2 mb-2">{{ session('success') }}</div> @endif
        @if(session('error')) <div class="bg-red-100 p-2 mb-2">{{ session('error') }}</div> @endif
        @yield('content')
    </div>
</body>
</html>
