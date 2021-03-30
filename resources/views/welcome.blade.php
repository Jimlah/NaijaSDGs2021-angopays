<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="bg-gray-100">
    <div class="w-full px-5 text-white md:px-20 " style="background-image: url('{{ asset('img/main-bg.jpg ') }}')">
       <nav class="flex items-center justify-between py-5">
            <div>
                <p class="text-xl font-bold">AngoPays</p>
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{ route('login') }}" class="border-b border-transparent hover:border-purple-500 hover:text-gray-200">Login</a>
                <a href="{{ route('register') }}" class="px-2 py-1 bg-purple-900 rounded-md hover:bg-purple-700" >Register</a>
            </div>
       </nav>
       <main class="flex flex-col-reverse items-center justify-center py-5 md:flex-row md:py-32 gap-y-10">
           <div class="flex items-center justify-center w-full mx-auto">
               <div class="">
                <p class="text-3xl font-bold text-white ">Making Transactions Easier</p><br>
                <ul class="list-disc list-inside ">
                    <li>USSD Based Transaction</li>
                    <li>SMS Based Transaction</li>
                    <li>Mobile Based Transaction</li>
                    <li>Web Based Transaction</li>
                </ul>
               </div>

           </div>
           <div class="flex items-center justify-center w-full">
               <img src="{{ URL::asset('img/mobile_payment.svg') }}" alt="" class="h-96">
           </div>
       </main>
    </div>

</body>

</html>
