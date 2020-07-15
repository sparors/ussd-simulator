<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>USSD Simulator</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Muli:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <!-- Scripts -->
        <script src="{{ config('app.env') === 'production' ? secure_asset('js/app.js') : asset('js/app.js') }}"></script>
        <!-- Styles -->
        <link href="{{ config('app.env') === 'production' ? secure_asset('css/app.css') : asset('css/app.css') }}" rel="stylesheet">
        <livewire:styles>
    </head>
    <body>
        <livewire:simulator />
        <livewire:scripts>
    </body>

    <script>
        document.addEventListener('livewire:load', function () {
            setInterval(function () {
                window.livewire.emit('alive');
            }, 180000);
        })
    </script>
</html>
