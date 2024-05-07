@extends('layouts.main')
@section('web_title', 'Arsip Surat')
@section('menu')
    @include('layouts.menu.sekretariat')
@endsection
@section('content_tittle', 'Detail Surat Keluar')
@section('content')
<div>
    <div>
        <div class="flex gap-5 mb-3">
            <a href="{{ URL::previous() }}">
                <button class="p-2 bg-slate-600 text-white rounded-md text-[18px] my-auto">
                    <i class="fas fa-angle-double-left text-[18px] my-auto"></i> Back
                </button>
            </a>
            <p class="ml-auto my-auto font-bold">Surat Dibuat: {{$suratKeluar -> created_at}}</p>
        </div>
        <div>
            @php
                foreach ($suratKeluar as $sm) {
                    $surat_kasuk = $suratKeluar -> email_pengarsip;
                    foreach ($users as $u) {
                        if ($surat_kasuk == $u -> email) {
                            $pengarsip = $u -> nama;
                        }
                    }
                }
            @endphp
            <p class="font-normal break-words mb-3">Diarsipkan oleh <b>{{$pengarsip}}</b> ({{$suratKeluar -> email_pengarsip}})</p>
        </div>
        <div class="grid grid-cols-3 gap-5">
            <div class="col-span-2">
                <embed class="w-[100%] h-[100%] min-h-[500px] desktop:min-h-[800px] rounded-md" src="../arsip/{{$suratKeluar -> berkas}}">
            </div>
            @php
                // Nama Kategori
                foreach ($suratKeluar as $kat) {
                    $id_kat = $suratKeluar -> id_kategori;
                    foreach ($kategori as $kat) {
                        if ($id_kat == $kat -> id) {
                            $nama_kat = $kat -> kategori;
                        }
                    }
                }
                // Nama unit
                foreach ($suratKeluar as $unt) {
                    $id_un = $suratKeluar -> id_unit;
                    foreach ($unit as $unt) {
                        if ($id_un == $unt -> id) {
                            $nama_unt = $unt -> unit;
                        }
                    }
                }
                // Nama pengirim                
                foreach ($suratKeluar as $sm) {
                    $surat_keluar = $suratKeluar -> email_tujuan;
                    foreach ($users as $u) {
                        if ($surat_keluar == $u -> email) {
                            $pengirim = $u -> nama;
                        }
                    }
                }
            @endphp
            <div class="col-span-1 bg-white border rounded-md shadow p-4 w-[100%]">
                <p class="font-bold text-[18px]">
                    <i class="fas fa-info-circle"></i>
                    Deskripsi Surat
                </p>
                <hr class="my-2">
                <div >
                    <div class="mb-2">
                        <label class="font-normal">Kode Surat</label>
                        <p class="font-semibold break-words">{{ $suratKeluar -> kode_surat }}</p>
                    </div>
                    <div class="mb-2">
                        <label class="font-normal">Kategori Surat</label>
                        <p class="font-semibold break-words">{{$nama_kat}}</p>
                    </div>
                    <div class="w-full grid grid-cols-2 gap-4 mb-2">
                        <div class="">
                            <label class="font-normal">Unit Pengirim</label>
                            <p class="font-semibold break-words">{{$nama_unt}}</p>
                        </div>
                        <div class="text-right">
                            <label class="font-normal">Tujuan Surat</label>
                            <p class="font-semibold break-words">{{$suratKeluar -> email_tujuan}}</p>
                            <p class="font-semibold break-words">{{$pengirim}}</p>
                        </div>
                    </div>
                    <div class="w-full my-4">
                        <label class="font-normal">Perihal / Subjek</label>
                        <p class="font-semibold break-words">{{$suratKeluar -> perihal}}</p>
                    </div>
                    <div class="w-full my-4">
                        <label class="font-normal">Keterangan Surat</label>
                        <p class="font-semibold break-words">{{$suratKeluar -> keterangan}}</p>
                    </div>
                    <div class="w-full my-4">
                        <label class="font-normal">Status Surat</label>
                        <p class="font-semibold break-words">{{$suratKeluar -> status}}</p>
                    </div>
                    <div class="my-2">
                        <a href="/Sekretariat/UpdateDetailArsipSuratKeluar-{{ $suratKeluar -> id }}">
                            <button class="bg-blue-700 p-3 rounded text-white font-semibold m-auto w-full hover:bg-blue-600" onclick="return confirm('Apakah Surat akan divalidasi?')">Validasi Surat</button>
                        </a>
                    </div>
                </div>
                <hr class="my-5">
                <div class="my-2">
                    <a href="">
                        <button class="bg-[#006B3F] p-3 rounded text-white font-semibold m-auto w-full hover:bg-[#018951]">Buat Surat Keluar</button>
                    </a>
                </div>
                <div class="my-2">
                    <a href="">
                        <button class="bg-[#006B3F] p-3 rounded text-white font-semibold m-auto w-full hover:bg-[#018951]">Buat Disposisi Surat Masuk</button>
                    </a>
                </div>
                <hr class="my-5">
                <div>
                    <a href="/Sekretariat/HapusArsipSuratKeluar-{{ $suratKeluar -> id }}">
                        <button class="bg-red-600 p-3 rounded text-white font-semibold m-auto w-full hover:bg-red-500" onclick="return confirm('Apakah Surat akan dihapus?')">Hapus Surat</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection