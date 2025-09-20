<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $title ?? 'UPT Bahasa, Kehumasan, dan Penerbitan' }}</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased">

    {{-- Header --}}
    @include('layout.header')

    <main class="container mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>
        <p>{{ $content }}</p>
    </main>

    {{-- Footer --}}
    @include('layout.footer')

</body>

</html>
