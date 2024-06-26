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
    <div class="grid h-[100%]">
        <!-- header -->
        <header class="bg-[#006B3F] rounded-md border shadow m-5 p-5">
            <div class="flex gap-1 my-auto">
                <img class="w-[2.75rem] h-[3.75rem] mr-2 my-auto" src="../assets/img/UKDW.png" alt="UKDW">
                <h1 class="text-xl font-semibold my-auto text-white">
                    ARSIP SURAT UNIVERSITAS KRISTEN DUTA WACANA
                </h1>
            </div>
        </header>
        <!-- main -->
        <div class="grid grid-cols-2 mx-5">
            <div class="col-span-1">
                <img class="w-[448px] h-[413px] desktop:w-[648px] desktop:h-[613px] mx-auto my-5" src="../assets/img/illustrator.png" alt="illustrator">
            </div>
            <div class="col-span-1 mx-auto">
                <div class="rounded-md shadow-md bg-white border w-[400px] laptop:w-[550px] desktop:w-[800px] h-auto">
                    <div class="m-3 py-3">
                        <p class="font-bold text-[24px] text-center text-[#006B3F]">LOGIN</p>
                        <hr>
                        @if ($errors->any())
                            <div class="my-3 flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 h-10" role="alert">
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
                                <label for="username" class="text-[18px]">Username</label>
                                <input type="text" name="username" placeholder="Username" class="bg-white border border-[#006B3F] border-1 rounded-md w-full p-2 focus:ring-green-800 focus:border-green-800">
                            </div>
                            <div class="m-3">
                                <label for="password" class="text-[18px]">Password</label>
                                <div class="flex gap-2">
                                    <input id="password" type="password" name="password" placeholder="••••••••" class="bg-white border border-[#006B3F] border-1 rounded-md w-full p-2 focus:ring-green-800 focus:border-green-800">
                                    <img class="w-[25px] cursor-pointer" src="../assets/icons/eye-slash-solid.svg" alt="" onclick="pass()" id="pass-icon">
                                </div>
                            </div>
                            <div class=" m-3 pt-3">
                                <button type="submit" class="bg-[#006B3F] text-white font-semibold rounded-md text-center p-3 w-full m-auto hover:bg-[#018951]">
                                    Login
                                    <i class="fas fa-sign-in-alt ml-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        @include('layouts.footer')
    </div>

    <script>
        var a;
        function pass()
        {
            if(a==1)
            {
                document.getElementById('password').type='password';
                document.getElementById('pass-icon').src='../assets/icons/eye-slash-solid.svg';
                a=0;
            }
            else
            {
                document.getElementById('password').type='text';
                document.getElementById('pass-icon').src='../assets/icons/eye-solid.svg';
                a=1;
            }
        }
    </script>
</body>
</html>
