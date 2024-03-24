<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Sistem Pengarsipan Surat UKDW</title>

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
    <!-- header -->
    <header class="border-b shadow-lg bg-[#006B3F] border-green-900 p-4 text-white">
        <div class="flex">
            <a href="">
                <div class="flex gap-2">
                    <img class="w-[2.75rem] h-[3.75rem] mr-2 my-auto" src="../assets/img/UKDW.png" alt="UKDW">
                    <h1 class="text-2xl font-semibold my-auto">
                        Sistem Informasi Pengarsipan Surat
                    </h1>
                </div>
            </a>
        </div>
    </header>

    <!-- main -->
    <main class="grid grid-cols-3 gap-4 m-5">
        <div class="col-span-2">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-1000 ease-in-out rounded-md" data-carousel-item>
                        <img src="../assets/img/Slide1.png" class="absolute block rounded-md w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-1000 ease-in-out rounded-md" data-carousel-item>
                        <img src="../assets/img/Slide2.png" class="absolute block rounded-md w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-1000 ease-in-out rounded-md" data-carousel-item>
                        <img src="../assets/img/Slide3.png" class="absolute block rounded-md w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
        <div class="rounded-md shadow-md bg-white border h-[300px]">
            <div class="m-3">
                <p class="font-bold text-[24px] text-center text-[#006B3F]">LOGIN</p>
                <hr>
                @if ($errors->any())
                    <div class="my-3 flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            @foreach ($errors->all() as $item)
                                {{ $item }}
                            @endforeach
                        </div>
                    </div>
                @endif
                <form action="{{ route('cekLogin') }}" method="post">
                    @csrf
                    <div class="m-3">
                        <label for="email" class="text-[18px] text-[#006B3F]">Email</label>
                        <input type="email" name="email" class="bg-white border border-[#006B3F] border-1 rounded-md w-full p-2 focus:ring-green-800 focus:border-green-800">
                    </div>
                    <div class="m-3">
                        <label for="password" class="text-[18px] text-[#006B3F]">Password</label>
                        <input type="password" name="password" placeholder="••••••••" class="bg-white border border-[#006B3F] border-1 rounded-md w-full p-2 focus:ring-green-800 focus:border-green-800">
                    </div>
                    <div class=" m-3">
                        <button type="submit" class="bg-[#006B3F] text-white font-semibold rounded-md text-center p-3 w-full">Login</button>
                    </div>
                </form>
            </div>
        </div>      
    </main>

    <!-- footer -->
    @include('layouts.footer')
</body>
</html>
