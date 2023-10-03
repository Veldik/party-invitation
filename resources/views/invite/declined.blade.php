<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')
    <title>{{ $guest->event->name }}</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
<div class="bg-white p-8 rounded shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Pozvánka odmítnuta</h1>
    <p class="text-gray-700 mb-4">Děkujeme, že jste odmítl(a) pozvánku.</p>
</div>
</body>
</html>
