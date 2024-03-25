@extends('layouts.main')
@section('web_title', 'Detail Surat Disposisi')
@section('menu')
    @include('layouts.menu.kepala_bidang')
@endsection
@section('content_tittle', 'Detail Surat Disposisi')
@section('content')
<div>
    <p class="font-normal mb-7">dd/mm/yyyy Surat Dibuat</p>

    <div class="w-full grid grid-cols-2 gap-4 mb-5">
        <div class="w-[300px]">
            <label class="font-normal">Unit Pengirim</label>
            <p class="text-[18px] font-semibold">Unit Pengirim</p>
        </div>
        <div class="w-[300px] text-right">
            <label class="font-normal">Kode Surat</label>
            <p class="text-[18px] font-semibold">kode Surat</p>
        </div>
    </div>
    <div class="w-full grid grid-cols-2 gap-4 mb-5">
        <div>
            <label class="font-normal">Pengirim</label>
            <p class="text-[18px] font-semibold">Nama / Email Pengirim</p>
        </div>
        <div class="w-[300px] text-right">
            <label class="font-normal">Kategori</label>
            <p class="text-[18px] font-semibold">Kategori</p>
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
    <div class="w-full mb-5">
        <label class="font-normal">Status Disposisi</label>
        <p class="text-[18px] font-semibold break-words">Status Disposisi</p>
    </div>

    <div class="flex gap-4">
        <div>
            <a href="">
                <button class="bg-[#006B3F] p-3 rounded text-white font-semibold mt-3 hover:bg-[#1c9e68]">Teruskan ke Dosen/Staff</button>
            </a>
        </div>
    </div>
</div>
@endsection