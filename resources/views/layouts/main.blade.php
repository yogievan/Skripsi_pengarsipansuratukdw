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

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- fontawesome css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    
    <!--font poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap" rel="stylesheet">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>
<body>
    <!-- Header -->
    @include('layouts.header')

    <div class="flex">
        <!-- Sidebar -->
        <aside class="bg-[#006B3F] border-gray-700 text-white w-64 min-h-screen p-4 ">
            <p class="font-semibold text-[24px]">MENU</p>
            <nav>
                <ul>
                    @yield('menu')
                </ul>
            </nav>
        </aside>
    
        <!-- Main Content -->
        <main class="flex p-4">
            <!-- content -->
            <div class="py-3 pl-5 pr-5 font-bold text-[#333333]">
                <p class="text-[1.5em] font-extrabold my-auto mb-3">
                    @yield('content_tittle')
                </p>
                
                <!-- content components -->
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Footer -->
    @include('layouts.footer')
</body>
@include('sweetalert::alert')
</html>