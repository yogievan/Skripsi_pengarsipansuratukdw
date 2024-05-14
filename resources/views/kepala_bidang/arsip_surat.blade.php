@extends('layouts.main')
@section('web_title', 'Arsip Surat')
@section('menu')
    @include('layouts.menu.kepala_bidang')
@endsection
@section('content_tittle', 'Arsip Surat')
@section('content')
    <div>
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2">
                {{-- tambah arsip surat baru --}}
                <div class=" flex gap-4">
                    <button data-modal-target="tambah_arsip_surat_masuk" data-modal-toggle="tambah_arsip_surat_masuk" class="bg-[#006B3F] p-3 rounded text-white font-semibold mt-3 hover:bg-[#018951]">Buat Surat Masuk</button>
                    <button data-modal-target="tambah_arsip_surat_keluar" data-modal-toggle="tambah_arsip_surat_keluar" class="bg-[#006B3F] p-3 rounded text-white font-semibold mt-3 hover:bg-[#018951]">Buat Surat Keluar</button>
                </div>
                {{-- Modal/ jendela tambah arsip surat masuk --}}
                <div id="tambah_arsip_surat_masuk" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-[1000px] max-h-full">
                        <div class="relative bg-white rounded-lg shadow p-4">
                            {{-- head modal --}}
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Arsipkan Surat Masuk
                                </h3>
                                <button data-modal-toggle="tambah_arsip_surat_masuk" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>

                            {{-- body modal --}}
                            <form action="{{ route('TambahArsipSuratMasuk_kepalaBidang') }}" method="Post">
                                @csrf
                                <div class="grid grid-cols-3 gap-4 my-2">
                                    <div class="col-span-1">
                                        <label class="font-semibold">Kategori Surat</label>
                                        <select name="id_kategori" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                            <option selected>Pilih Kategori Surat</option>
                                            @foreach ($kategori as $item)
                                                <option value="{{ $item -> id }}">{{ $item -> kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-2">
                                        <label class="font-semibold">Unit Pengirim</label>
                                        <select name="id_unit" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                            <option selected>Pilih Unit Pengirim</option>
                                            @foreach ($unit as $item)
                                                <option value="{{ $item -> id }}">{{ $item -> unit }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="my-2">
                                    <label class="font-semibold">Pengirim Surat</label>
                                    <input name="email_pengirim" value="{{ $pengirim }}" type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" readonly>
                                </div>
                                <div class="my-2">
                                    <label class="font-semibold">Tujuan Surat</label>
                                    <input name="email_tujuan" type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                                </div>
                                <div class="my-2">
                                    <label class="font-semibold">Perihal / Subjek</label>
                                    <input name="perihal" type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" placeholder="Subjek:" required>
                                </div>
                                <div class="my-2">
                                    <label class="font-semibold">Keterangan</label><br>
                                    <textarea name="keterangan" class="block bg-white w-full h-[200px] rounded font-normal focus:ring-green-500 focus:border-green-500"></textarea>
                                </div>
                                <div class="my-2">
                                    <label class="font-semibold">Upload Berkas Surat</label>
                                    <input name="berkas" class="block w-[50%] text-sm text-gray-500 border border-[#006B3F] rounded cursor-pointer bg-white focus:outline-none" type="file">
                                </div>
                                <div class="mt-[30px]">
                                    <Button class="bg-[#006B3F] p-3 rounded text-white w-[200px] font-semibold hover:bg-[#018951]" onclick="return confirm('Apakah Data telah diisi dengan benar?')">Simpan & Kirim</Button>
                                </div>
                                <p class="text-red-600 mt-1 font-normal">
                                    *Note: Pastikan Berkas yang di Upload sudah sesuai!
                                </p>
                                <input name="status" type="text" value="Belum Tervalidasi Sekretariat" hidden>
                                @php
                                    $email = Auth::user()->email;
                                @endphp
                                <input name="email_pengarsip" type="email" value="{{ $email }}" hidden>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Modal/ jendela tambah arsip surat keluar --}}
                <div id="tambah_arsip_surat_keluar" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-[1000px] max-h-full">
                        <div class="relative bg-white rounded-lg shadow p-4">
                            {{-- head modal --}}
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Arsipkan Surat Keluar
                                </h3>
                                <button data-modal-toggle="tambah_arsip_surat_keluar" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>

                            {{-- body modal --}}
                            <form action="{{route('TambahArsipSuratKeluar_kepalaBidang')}}" method="post">
                                @csrf
                                <div class="my-2">
                                    <label class="font-semibold">Kode Surat</label>
                                    <input name="kode_surat" type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                                </div>
                                <div class="grid grid-cols-3 gap-2 my-2">
                                    <div class="col-span-1">
                                        <label class="font-semibold">Kategori Surat</label>
                                        <div class="flex gap-2">
                                            <select name="id_kategori" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                                <option selected>Pilih Kategori Surat</option>
                                                @foreach ($kategori as $item)
                                                    <option value="{{ $item -> id }}">{{ $item -> kategori }}</option>
                                                @endforeach
                                            </select>
                                            <i data-popover-target="info-kategori" class="fas fa-info-circle text-xl m-auto"></i>
                                            {{-- pop up content --}}
                                            <div data-popover id="info-kategori" role="tooltip" class="absolute z-10 invisible inline-block w-[400px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
                                                <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg">
                                                    <h3 class="font-semibold text-gray-900 dark:text-white">Informasi</h3>
                                                </div>
                                                <div class="px-3 py-2">
                                                    @foreach ($kategori as $item)
                                                    <b>{{ $item -> kategori }}</b> : {{ $item -> deskripsi }} <br>
                                                    @endforeach
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-2">
                                        <label class="font-semibold">Unit Pengirim</label>
                                        <select name="id_unit" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                            <option selected>Pilih Unit Pengirim</option>
                                            @foreach ($unit as $item)
                                                <option value="{{ $item -> id }}">{{ $item -> unit }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="my-2">
                                    <label class="font-semibold">Pengirim Surat</label>
                                    <input name="email_pengirim" value="{{ $pengirim }}" type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" readonly>
                                </div>
                                <div class="my-2">
                                    <label class="font-semibold">Tujuan Surat</label>
                                    <input name="email_tujuan" type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                                </div>
                                <div class="my-2">
                                    <label class="font-semibold">Perihal / Subjek</label>
                                    <input name="perihal" type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" placeholder="Subjek:" required>
                                </div>
                                <div class="my-2">
                                    <label class="font-semibold">Keterangan</label><br>
                                    <textarea name="keterangan" class="block bg-white w-full h-[200px] rounded font-normal focus:ring-green-500 focus:border-green-500"></textarea>
                                </div>
                                <div class="my-2">
                                    <label class="font-semibold">Upload Berkas Surat</label>
                                    <input name="berkas" class="block w-[50%] text-sm text-gray-500 border border-[#006B3F] rounded cursor-pointer bg-white focus:outline-none" type="file">
                                </div>
                                <div class="mt-[30px]">
                                    <Button class="bg-[#006B3F] p-3 rounded text-white w-[200px] font-semibold hover:bg-[#018951]" onclick="return confirm('Apakah Data telah diisi dengan benar?')">Simpan & Kirim</Button>
                                </div>
                                <p class="text-red-600 mt-1 font-normal">
                                    *Note: Pastikan Berkas yang di Upload sudah sesuai!
                                </p>
                                <input name="status" type="text" value="Belum Tervalidasi Sekretariat" hidden>
                                @php
                                    $email = Auth::user()->email;
                                @endphp
                                <input name="email_pengarsip" type="email" value="{{ $email }}" hidden>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- table --}}
        <div class="mt-8">
            <p class="font-semibold mb-2 text-[18px]">List Surat Masuk ({{ $date }})</p>
            <div class="relative overflow-x-auto border rounded">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center border w-[50px]">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[100px]">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[300px]">
                                Perihal Surat
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[150px]">
                                File Surat
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[150px]">
                                Status Surat
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[200px]">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suratMasuk as $no => $item)
                            <tr class="bg-white border-b">
                                <td scope="row" class="px-6 py-4 text-center border w-[50px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $suratMasuk -> firstItem() + $no}}
                                </td>
                                <td class="px-6 py-4 text-center border w-[100px] break-words">
                                    {{ $item -> created_at }}
                                </td>
                                <td class="px-6 py-4 border w-[300px] break-words">
                                    {{ $item -> perihal }} 
                                </td>
                                <td class="px-6 py-4 text-center border w-[150px] break-words">
                                    {{ $item -> berkas }}
                                </td>
                                <td class="px-6 py-4 text-center border w-[150px]">
                                    @php
                                        if ( $item -> status == 'Tervalidasi Sekretariat') {
                                            echo "<p class="."status_green"."> $item->status </p>";
                                        }else {
                                            echo "<p class="."status_red"."> $item->status </p>";
                                        }
                                    @endphp
                                </td>
                                <td class="flex gap-2 px-auto py-4 text-center justify-center w-full">
                                    <a href="/KepalaBidang/DetailArsipSuratMasuk-{{ $item -> id }}">
                                        <button class="w-[100px] bg-blue-700 p-3 rounded text-white hover:bg-blue-600">Detail Surat</button>
                                    </a>
                                    <a href="/KepalaBidang/EditArsipSuratMasuk-{{ $item -> id }}">
                                        <button class="w-[100px] bg-yellow-400 p-3 rounded text-white hover:bg-yellow-300">Edit Surat</button>
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
                    {{ $suratMasuk -> firstItem() }}
                    sampai
                    {{ $suratMasuk -> lastItem() }}
                    dari
                    {{ $suratMasuk -> total() }}
                    Surat Masuk
                </div>
                <div class="my-auto ml-auto">
                    {{ $suratMasuk->links() }}
                </div>
            </div>
        </div>

        {{-- table --}}
        <div class="mt-8">
            <p class="font-semibold mb-2 text-[18px]">List Surat Keluar ({{ $date }})</p>
            <div class="relative overflow-x-auto border rounded">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center border w-[50px]">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[75px]">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[100px]">
                                Kode Surat
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[300px]">
                                Perihal Surat
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[150px]">
                                File Surat
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[150px]">
                                Status Surat
                            </th>
                            <th scope="col" class="px-6 py-3 text-center border w-[200px]">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suratKeluar as $no => $item)
                        <tr class="bg-white border-b">
                            <td scope="row" class="px-6 py-4 text-center border w-[50px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $suratKeluar -> firstItem() + $no}}
                            </td>
                            <td class="px-6 py-4 text-center border w-[75px] break-words">
                                {{ $item -> created_at }}
                            </td>
                            <td class="px-6 py-4 text-center border w-[100px] break-words">
                                {{ $item -> kode_surat }}
                            </td>
                            <td class="px-6 py-4 border w-[300px] break-words">
                                {{ $item -> perihal }} 
                            </td>
                            <td class="px-6 py-4 text-center border w-[150px] break-words">
                                {{ $item -> berkas }}
                            </td>
                            <td class="px-6 py-4 text-center border w-[150px]">
                                @php
                                    if ( $item -> status == 'Tervalidasi Sekretariat') {
                                        echo "<p class="."status_green"."> $item->status </p>";
                                    }else {
                                        echo "<p class="."status_red"."> $item->status </p>";
                                    }
                                @endphp
                            </td>
                            <td class="flex gap-2 px-auto py-4 text-center justify-center w-full">
                                <a href="/KepalaBidang/DetailArsipSuratKeluar-{{ $item -> id }}">
                                    <button class="w-[100px] bg-blue-700 p-3 rounded text-white hover:bg-blue-600">Detail Surat</button>
                                </a>
                                <a href="/KepalaBidang/EditArsipSuratKeluar-{{ $item -> id }}">
                                    <button class="w-[100px] bg-yellow-400 p-3 rounded text-white hover:bg-yellow-300">Edit Surat</button>
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
                    {{ $suratKeluar -> firstItem() }}
                    sampai
                    {{ $suratKeluar -> lastItem() }}
                    dari
                    {{ $suratKeluar -> total() }}
                    Surat Keluar
                </div>
                <div class="my-auto ml-auto">
                    {{ $suratKeluar->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection