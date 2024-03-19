@extends('layouts.main')
@section('web_title', 'Arsip Surat')
@section('menu')
    @include('layouts.menu.sekretariat')
@endsection
@section('content_tittle', 'Detail Surat Masuk')
@section('content')
    <div>
        <p class="font-normal mb-7">dd/mm/yyyy Surat Dibuat</p>

        <div class="w-full grid grid-cols-2 gap-4 mb-5">
            <div class="w-[300px]">
                <label class="font-normal">Unit Pengirim</label>
                <p class="text-[18px] font-semibold">Unit Pengirim</p>
            </div>
            <div class="w-[300px] text-right">
                <label class="font-normal">Kategori</label>
                <p class="text-[18px] font-semibold">Kategori</p>
            </div>
        </div>
        <div class="w-full mb-5">
            <div>
                <label class="font-normal">Pengirim</label>
                <p class="text-[18px] font-semibold">Nama / Email Pengirim</p>
            </div>
        </div>
        <div class="w-full mb-5">
            <label class="font-normal">Perihal / Subjek</label>
            <p class="text-[18px] font-semibold break-words">Perihal / Subjek Surat Masuk</p>
        </div>
        <div class="w-full mb-5">
            <label class="font-normal">Keterangan</label>
            <p class="text-[18px] font-semibold break-words">Keterangan Surat Masuk</p>
        </div>
        <div class="w-full mb-5">
            <label class="font-normal">Berkas</label>
            <p class="text-[18px] font-semibold break-words">Nama File Surat Masuk</p>
        </div>

        <div class="flex gap-4">
            <div>
                <a href="">
                    <button class="bg-[#006B3F] p-3 rounded text-white font-semibold mt-3 hover:bg-[#1c9e68]">Buat Surat Keluar</button>
                </a>
            </div>
            <div>
                <a href="">
                    <button class="bg-[#006B3F] p-3 rounded text-white font-semibold mt-3 hover:bg-[#1c9e68]">Buat Disposisi Surat Masuk</button>
                </a>
            </div>
            <div>
                <a href="">
                    <button class="bg-red-700 p-3 rounded text-white font-semibold mt-3 hover:bg-red-500">Hapus Surat Masuk</button>
                </a>
            </div>
        </div>
    </div>
@endsection