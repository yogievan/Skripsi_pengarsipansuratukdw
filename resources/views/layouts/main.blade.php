<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('web_title', 'Tanpa Judul')
    </title>
    @vite(['resources/css/app.css','resources/js/app.js'])

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- fontawesome css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    
    {{-- font poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap" rel="stylesheet">

    {{-- favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">   
</head>
<body>
    <div class="grid">
        <div class="flex">
            <div class="w-[300px]">
                {{-- Sidebar --}}
                <aside class="bg-[#006B3F] border-gray-700 text-white h-[100%] p-4">
                    <div class="flex gap-1">
                        <img class="w-[2.75rem] h-[3.75rem] mr-2 my-auto" src="../assets/img/UKDW.png" alt="UKDW">
                        <h1 class="text-xl font-semibold my-auto">
                            ARSIP SURAT
                        </h1>
                    </div>
                    <p class="font-semibold text-[24px] my-3">MENU</p>
                    <nav>
                        <ul class="mt-5">
                            @yield('menu')
                        </ul>
                    </nav>
                </aside>
            </div>
            <div class="w-[100%] m-3">
                {{-- Header --}}
                @include('layouts.header')

                {{-- Main Content --}}
                <main>
                    {{-- optional content --}}
                    @yield('optional_content')

                    {{-- content 2 --}}
                    <div class="bg-white rounded-md border shadow mt-5 p-4 min-h-[670px]">
                        {{-- content components --}}
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
        <div>
            {{-- Footer --}}
            @include('layouts.footer')
        </div>
    </div>
</body>
@include('sweetalert::alert')
</html>