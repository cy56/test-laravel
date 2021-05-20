<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Currency Converter</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
</head>
<body class="antialiased bg-gray-200">
    <div id="app">
        <main class="p-2">
            <livewire:currency-conversion />
        </main>
    </div>
    @livewireScripts
</body>
</html>
