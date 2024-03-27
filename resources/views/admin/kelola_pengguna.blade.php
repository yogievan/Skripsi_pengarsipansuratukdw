@extends('layouts.main')
@section('web_title', 'Kelola Pengguna')
@section('menu')
    @include('layouts.menu.admin')
@endsection
@section('content_tittle', 'Kelola Pengguna')
@section('content')
    <div>
        <div class="grid grid-cols-3 gap-4">
            <div>
                {{-- Tambah Akun Pengguna --}}
                <button data-modal-target="tambah_akun" data-modal-toggle="tambah_akun" class="bg-[#006B3F] p-3 rounded text-white font-semibold mt-3 hover:bg-[#1c9e68]">Buat Akun Baru</button>

                {{-- Modal/ jendela Tambah Akun Pengguna --}}
                <div id="tambah_akun" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-[1000px] max-h-full">
                        <div class="relative bg-white rounded-lg shadow p-4">
                            {{-- head modal --}}
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Tambah Akun Pengguna
                                </h3>
                                <button data-modal-toggle="tambah_akun" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>

                            {{-- body modal --}}
                            <form action="">
                                @csrf
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3">
                                        <div class="py-2">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="nama" placeholder="Masukkan Nama Peengguna" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                                        </div>
                                        <div class="py-2">
                                            <label>Email</label>
                                            <input type="email" name="email" placeholder="Masukkan email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="py-2">
                                                <label>Username</label>
                                                <input type="text" name="username" placeholder="Masukkan Username" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                                            </div>
                                            <div class="py-2">
                                                <label>Password</label>
                                                <input type="password" name="password" placeholder="••••••••" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                                            </div>
                                        </div>
                                        <div class="py-2">
                                            <label>Role / Jabatan</label>
                                            <select class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                                <option selected>Pilih Role</option>
                                                <option value="KepalaBidang">Kepala Bidang</option>
                                                <option value="DosenStaff">Dosen atau Staff</option>
                                                <option value="Sekretariat">Sekretariat</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="py-2">
                                                <label>Unit</label>
                                                <select name="id_unit" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                                    <option selected>Pilih Unit</option>
                                                    @foreach ($unit as $no => $u)
                                                        <option value="{{ $u -> id }}">{{ $u -> unit }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="py-2">
                                                <label>Deskripsi Jabatan</label>
                                                <select name="id_jabatan" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                                    <option selected>Pilih Deskripsi Jabatan</option>
                                                    @foreach ($jabatan as $no => $j)
                                                        <option value="{{ $j -> id }}">{{ $j -> jabatan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="">
                                        <button class="bg-[#006B3F] p-3 rounded text-white font-semibold mt-3 hover:bg-[#1c9e68] w-[200px]">Buat Akun</button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div></div>
            <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-e-0 rounded-s-md">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" class="rounded-none rounded-e-lg bg-white border focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm border-gray-200 p-2.5" placeholder="Cari Pengguna">
              </div>
            </div>

        {{-- table --}}
        <div class="mt-8">
            <div class="relative overflow-x-auto border rounded">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center border w-[50px]">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[250px]">
                                Nama Pengguna
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[250px]">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[250px]">
                                Unit / Jabatan
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[150px]">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 text-center border w-[50px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                no
                            </th>
                            <td class="px-6 py-4 text-center border w-[250px] break-words">
                                Nama Pengguna
                            </td>
                            <td class="px-6 py-4 text-center border w-[250px] break-words">
                                Email 
                            </td>
                            <td class="px-6 py-4 text-center border w-[250px] break-words">
                                Unit / Jabatan
                            </td>
                            <td class="px-6 py-4 text-center border w-[150px]">
                                <a href="">
                                    <button class="bg-blue-700 p-3 rounded text-white hover:bg-blue-400">Detail</button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection