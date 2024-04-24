<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')
    <title>{{ $guest->event->name }}</title>
</head>
<body class="h-screen" style="background: {{ $guest->event->color }}">
<div>

    <div class="flex justify-center items-center h-screen">
        <div class="text-center">
            <div class="text-white p-8 border-b-2">
                <h1 class="text-2xl font-bold mb-4">Pozvánka přijata</h1>
                <p class="text-white mb-4">Děkujeme, že jste přijal(a) pozvánku.</p>
            </div>
            <br>
            <h1 class="text-4xl font-bold text-white">{{ $guest->event->name }}</h1>
            <p class="text-2xl text-white">{{ $guest->event->description }}</p>
            <br>
            <p>
                <a href="https://www.google.com/maps/search/?api=1&query={{$guest->event->lat}},{{$guest->event->lng}}"
                   class="text-2xl text-white hover:underline transition">{{ $guest->event->location }}</a>

            </p>
            <br>
            <p class="text-2xl text-white">{{ trans(Carbon\Carbon::create($guest->event->start)->isoFormat('LLLL')) }}</p>
            <p class="text-white">{{ Carbon\Carbon::create($guest->event->start)->diffForHumans() }}</p>
        </div>
    </div>
</div>
</body>
</html>
