<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @vite('resources/css/app.css')
        <title>{{ $event->name }}</title>
    </head>
    <body class="h-screen" style="background: {{ $event->color }}">
        <div>
            <div class="flex justify-center items-center h-screen">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-white">{{ $event->name }}</h1>
                    <p class="text-2xl text-white">{{ $event->description }}</p>
                    <br>
                    <p>
                        <a href="https://www.google.com/maps/search/?api=1&query={{$event->lat}},{{$event->lng}}" class="text-2xl text-white hover:underline transition">{{ $event->location }}</a>

                    </p>
                    <br>
                    <p class="text-2xl text-white">{{ trans(Carbon\Carbon::create($event->start)->isoFormat('LLLL')) }}</p>
                    <p class="text-white">{{ Carbon\Carbon::create($event->start)->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </body>
</html>
