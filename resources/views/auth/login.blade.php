<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body>
    <div class="flex flex-col items-center justify-center w-full h-screen"
        style="background-image: url('{{ asset('img/main-bg.jpg ') }}')">
        @include('components.flash-message')

        <form action="" method="post" class="flex flex-col items-center justify-center px-5 py-10 space-y-4 text-white bg-gray-500 bg-opacity-50 sm:w-1/2 md:w-1/4">
            <p class="text-xl font-bold">Login</p>
            @csrf
            <div class="flex flex-col w-full">
                <label for="email">Email</label>
                <input class="w-full px-2 py-1 text-black" type="email" name="email" id="email">
            </div>
            <div class="flex flex-col w-full">
                <label for="password">Password</label>
                <input class="w-full px-2 py-1 text-black" type="password" name="password" id="password">
            </div>
            <div class="flex flex-col w-full ">
                <button class="w-full py-1 py-2 font-bold bg-purple-900" type="submit">Login</button>
            </div>
        </form>

    </div>
</body>

</html>
