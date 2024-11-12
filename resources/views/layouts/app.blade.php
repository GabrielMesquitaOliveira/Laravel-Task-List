<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Laravel Task List App</title>
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-2xl mb-4">@yield('title')</h1>

    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded-lg shadow-md">
            <strong>Success:</strong> {{ session('success') }}
        </div>
    @endif

    <div>
        @yield('content')
    </div>
</body>

</html>
