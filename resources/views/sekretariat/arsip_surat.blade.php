@extends('layouts.main')
@section('web_title', 'Arsip Surat')
@section('menu')
    @include('layouts.menu.sekretariat')
@endsection
@section('content_tittle', 'Arsip Surat')
@section('content')
    <div>
        <div class="grid grid-cols-3 gap-4">
            <div>
                <a href="{{ route('TambahSuratMasuk_Sekretariat') }}">
                    <button class="bg-[#006B3F] p-3 rounded text-white font-semibold mt-3 hover:bg-[#1c9e68]">Tambah Surat Masuk</button>
                </a>
            </div>
            <div></div>
            <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-e-0 rounded-s-md">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" id="website-admin" class="rounded-none rounded-e-lg bg-white border focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm border-gray-200 p-2.5" placeholder="Cari Arsip Surat Masuk">
              </div>
            </div>

        {{-- table --}}
        <div class="mt-8">
            <div class="relative overflow-x-auto border rounded">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center border w-[50px]">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[100px]">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[350px]">
                                Perihal Surat
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[150px]">
                                File Surat
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[150px]">
                                Status Surat Keluar / Disposisi
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[200px]">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 text-center border w-[50px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                no
                            </th>
                            <td class="px-6 py-4 text-center border w-[100px]">
                                Silver
                            </td>
                            <td class="px-6 py-4 text-center border w-[350px] break-words">
                                asdasdasdasda 
                            </td>
                            <td class="px-6 py-4 text-center border w-[150px]">
                                $2999
                            </td>
                            <td class="px-6 py-4 text-center border w-[150px]">
                                <p class="bg-green-500 text-white p-1 rounded">Sudah Dibuat</p>
                                <p class="bg-red-500 text-white p-1 rounded">Belum Dibuat</p>
                            </td>
                            <td class="px-6 py-4 text-center border w-[150px]">
                                <a href="{{ route('DetailArsipSurat_sekretariat') }}">
                                    <button class="bg-blue-700 p-3 rounded text-white hover:bg-blue-400">Detail Surat</button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection