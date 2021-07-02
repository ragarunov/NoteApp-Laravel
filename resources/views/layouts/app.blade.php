<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-blue-200">
    <nav class="bg-white p-4 mb-8">
        <ul class="flex justify-center">
            <li>
                <a href="{{ route('home') }}" class="p-6">Home</a>
            </li>
            <li>
                <a href="{{ route('notes') }}" class="p-6">Posts</a>
            </li>
        </ul>
    </nav>
    @yield('content')
</body>
</html>