@extends('layouts.main')
@section('web_title', 'Arsip Surat')
@section('menu')
    @include('layouts.menu.dosen_staff')
@endsection
@section('content_tittle', 'Arsip Surat')
@section('content')
    <div>
        <div class="grid grid-cols-3 gap-4">
            <div>
                {{-- tambah arsip surat baru --}}
                <button data-modal-target="tambah_arsip_surat" data-modal-toggle="tambah_arsip_surat" class="bg-[#006B3F] p-3 rounded text-white font-semibold mt-3 hover:bg-[#1c9e68]">Tambah Surat Masuk</button>

                {{-- Modal/ jendela tambah arsip surat baru --}}
                <div id="tambah_arsip_surat" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-[1000px] max-h-full">
                        <div class="relative bg-white rounded-lg shadow p-4">
                            {{-- head modal --}}
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Arsipkan Surat Masuk
                                </h3>
                                <button data-modal-toggle="tambah_arsip_surat" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>

                            {{-- body modal --}}
                            <form action="" class="grid">
                                <div class="grid grid-cols-3 gap-4 my-2">
                                    <div class="col-span-1">
                                        <label>Kategori Surat</label>
                                        <select class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                            <option selected>Pilih Kategori Surat</option>
                                            <option value="US">United States</option>
                                        </select>
                                    </div>
                                    <div class="col-span-2">
                                        <label>Unit Pengirim</label>
                                        <select class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                            <option selected>Pilih Unit Pengirim</option>
                                            <option value="US">United States</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="my-2">
                                    <label>Pengirim</label>
                                    <input type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                                </div>
                                <div class="my-2">
                                    <label>Perihal / Subjek</label>
                                    <input type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" placeholder="Subjek:" required>
                                </div>
                                <div class="my-2">
                                    <label>Keterangan</label><br>
                                    <textarea class="block bg-white w-full h-[200px] rounded font-normal focus:ring-green-500 focus:border-green-500"></textarea>
                                </div>
                                <div class="my-2">
                                    <label>Upload Berkas Surat</label>
                                    <input class="block w-[50%] text-sm text-gray-500 border border-[#006B3F] rounded cursor-pointer bg-white focus:outline-none" type="file">
                                </div>
                                <div class="mt-[50px]">
                                    <Button class="bg-[#006B3F] p-3 rounded text-white w-[200px] hover:bg-[#3bca8f]">Arsipkan</Button>
                                </div>
                                <p class="text-red-600 mt-1 font-normal">
                                    *Note: Pastikan Berkas yang di Upload sudah sesuai!
                                </p>
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