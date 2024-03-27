@php
    use App\Models\User;
    $id = Auth::user()->id;
    $user = User::find($id);
    $name = Auth::user()->nama;
    $username = Auth::user()->username;
    $email = Auth::user()->email;
    $unit = Auth::user()->id_unit;
    $desc_jabatan = Auth::user()->id_jabatan;
    $password = Auth::user()->password;
@endphp
<header class="border-b shadow-lg bg-[#006B3F] border-green-900 p-4 text-white">
    <div class="flex">
        <div class="flex gap-2">
            <img class="w-[2.75rem] h-[3.75rem] mr-2 my-auto" src="../assets/img/UKDW.png" alt="UKDW">
            <h1 class="text-2xl font-semibold my-auto">
                Sistem Informasi Pengarsipan Surat
            </h1>
        </div>
        <p class="ml-auto mr-5 my-auto font-semibold">
            {{ $name }}
        </p>
        <div class="mr-10 my-auto">
            <button data-popover-target="popover-user-profile" type="button" class="w-[60px] bg-white p-1 rounded-full border">
                <img class="rounded-full" src="../assets/profile/profile_default.png" />
            </button>

            <div data-popover id="popover-user-profile" role="tooltip" class="absolute z-10 invisible inline-block w-72 h-auto text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-md opacity-0">
                <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg">
                    <div class="flex items-center justify-between">
                        <p class="font-bold text-base">Data Pengguna</p>
                        <div>
                            <button value="{{ $user -> id }}" data-modal-target="update_profile" data-modal-toggle="update_profile" type="button" class="text-white w-14 bg-blue-700 hover:bg-blue-500 font-medium rounded-lg text-xs px-3 py-1.5">
                                <i class="fas fa-wrench"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="px-3 py-2">
                    <p class="text-base font-semibold leading-none text-gray-900 mb-1">{{ $name }}</p>
                    <p class="text-[14px] font-normal leading-none text-gray-900 mb-[20px]">{{ $email }}</p>
                    <p class="text-base font-semibold leading-none text-gray-900 mb-1">{{ $unit }}</p>
                    <p class="text-[14px] font-normal leading-none text-gray-900 mb-3">{{ $desc_jabatan }}</p>
                </div>
                <div class="px-3 py-2 bg-gray-100 border-t border-gray-200 right-0">
                    <a href="{{ route('logout') }}">
                        <button class="w-full bg-red-600 text-white font-bold py-2 px-4 rounded-2xl border hover:bg-red-400 hover:text-white hover:shadow" title="Keluar">
                            LOG OUT <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </a>
                </div>
            </div>

            <div id="update_profile" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">

                    <div class="relative bg-white rounded-lg shadow">

                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Pengaturan Pengguna
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="update_profile">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        <form class="p-4 md:p-5" action="/UpdateUser/{{ $user -> id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                    <input type="text" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="Nama Pengguna" value="{{ $name }}" required>
                                </div>
                                <div class="col-span-2">
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                                    <input type="text" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="Nama Pengguna" value="{{ $username }}" required>
                                </div>
                                <div class="col-span-2">
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                    <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="{{ $email }}" readonly>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Unit</label>
                                    <input type="text" name="id_unit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="{{ $unit }}" readonly>
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Jabatan</label>
                                    <input type="text" name="id_jabatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="{{ $desc_jabatan }}" readonly>
                                </div>
                                <div class="col-span-2">
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Password Baru</label>
                                    <input type="password" name="password" class="bg-gray-50 text-gray-900 border border-gray-300 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="Wajib Memasukkan Password Baru">
                                    <p class="text-[12px] text-red-600">*Note: Bila <b>tidak ingin mengganti Password</b> kosongkan saja!</p>
                                </div>
                            </div>
                            <Button class="bg-[#006B3F] p-3 rounded text-white font-bold w-full hover:bg-[#3bca8f]">Simpan Perubahan</Button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>