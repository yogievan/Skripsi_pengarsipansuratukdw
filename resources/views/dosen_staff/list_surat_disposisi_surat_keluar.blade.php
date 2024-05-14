@extends('layouts.main')
@section('web_title', 'List Surat Disposisi')
@section('menu')
    @include('layouts.menu.dosen_staff')
@endsection
@section('content_tittle', 'List Disposisi Surat Keluar')
@section('content')
    <div>
        <div class="flex h-[60px] w-[600px] ml-auto">
            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-e-0 rounded-s-md">
                <i class="fas fa-search"></i>
            </span>
            <input type="text" class="rounded-none rounded-e-lg bg-white border focus:ring-green-500 focus:border-green-500 block flex-1 min-w-0 w-full text-sm border-gray-200 p-2.5" placeholder="Cari Arsip Disposisi Surat Masuk">
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
                                Catatan
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[150px]">
                                Lampiran
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[150px]">
                                Status Disposisi
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[200px]">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($disposisiSuratKeluar as $no => $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 text-center border w-[50px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $disposisiSuratKeluar -> firstItem() + $no}}
                            </th>
                            <td class="px-6 py-4 text-center border w-[100px]">
                                {{ $item -> created_at }}
                            </td>
                            <td class="px-6 py-4 border w-[350px] break-words">
                                {{ $item -> catatan }}
                            </td>
                            <td class="px-6 py-4 text-center border w-[150px]">
                                {{ $item -> lampiran }}
                            </td>
                            <td class="px-6 py-4 text-center border w-[150px]">
                                <p class="status_green">{{ $item -> status }}</p>
                            </td>
                            <td class="text-center w-[200px] mx-auto my-10">
                                <a href="/DosenStaff/DetailDisposisiSuratKeluar-{{ $item -> id }}">
                                    <button class="bg-blue-700 p-3 rounded text-white hover:bg-blue-600">Detail Disposisi</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex gap-2 mt-4">
                <div class="my-auto">
                    Data
                    {{ $disposisiSuratKeluar -> firstItem() }}
                    sampai
                    {{ $disposisiSuratKeluar -> lastItem() }}
                    dari
                    {{ $disposisiSuratKeluar -> total() }}
                    Disposisi Surat Keluar
                </div>
                <div class="my-auto ml-auto">
                    {{ $disposisiSuratKeluar->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection