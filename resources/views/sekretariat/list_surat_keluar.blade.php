@extends('layouts.main')
@section('web_title', 'List Surat Masuk')
@section('menu')
    @include('layouts.menu.sekretariat')
@endsection
@section('content_tittle', 'List Surat Keluar')
@section('content')
    <div>
        <div class="grid grid-cols-3 gap-4">
            <div>
            </div>
            <div></div>
            <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-e-0 rounded-s-md">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" class="rounded-none rounded-e-lg bg-white border focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm border-gray-200 p-2.5" placeholder="Cari Arsip Surat Keluar">
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
                            <th scope="col" class="px-6 py-3 text-center border w-[130px]">
                                Kode Surat
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
                            <th scope="col" class="px-6 py-3 text-center border w-[200px]">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 text-center border w-[50px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                No
                            </th>
                            <td class="px-6 py-4 text-center border w-[130px]">
                                Unit/tgl/no
                            </td>
                            <td class="px-6 py-4 text-center border w-[100px]">
                                dd/mm/yyyy
                            </td>
                            <td class="px-6 py-4 text-center border w-[350px] break-words">
                                asdasdasdasda asdasdasdasda 
                            </td>
                            <td class="px-6 py-4 text-center border w-[150px]">
                                Nama File
                            </td>
                            <td class="flex gap-2 mx-auto my-10 text-center w-[150px]">
                                <a href="{{ route('DetailArsipSurat_sekretariat') }}">
                                    <button class="bg-blue-700 p-3 rounded text-white hover:bg-blue-400">Detail</button>
                                </a>
                                <a href="">
                                    <button class="bg-red-500 p-3 rounded text-white hover:bg-red-400">Hapus</button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection