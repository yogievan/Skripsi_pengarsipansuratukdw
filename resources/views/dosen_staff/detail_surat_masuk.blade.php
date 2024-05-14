@extends('layouts.main')
@section('web_title', 'Arsip Surat')
@section('menu')
    @include('layouts.menu.dosen_staff')
@endsection
@section('content_tittle', 'Detail Surat Masuk')
@section('content')
    <div>
        <div class="flex gap-5 mb-3">
            <a href="{{ URL::previous() }}">
                <button class="p-2 bg-slate-600 text-white rounded-md text-[18px] my-auto">
                    <i class="fas fa-angle-double-left text-[18px] my-auto"></i> Back
                </button>
            </a>
            <p class="ml-auto my-auto font-bold">Surat dibuat: {{$suratMasuk -> created_at}}</p>
        </div>
        <div>
            @php
                foreach ($suratMasuk as $sm) {
                    $surat_masuk = $suratMasuk -> email_pengarsip;
                    foreach ($users as $u) {
                        if ($surat_masuk == $u -> email) {
                            $pengarsip = $u -> nama;
                        }
                    }
                }
            @endphp
            <p class="font-normal break-words mb-3">Diarsipkan oleh <b>{{$pengarsip}}</b> ({{$suratMasuk -> email_pengarsip}})</p>
        </div>
        <div class="grid grid-cols-3 gap-5">
            <div class="col-span-2">
                <embed class="w-[100%] h-[100%] min-h-[500px] desktop:min-h-[800px] rounded-md" src="../arsip/{{$suratMasuk -> berkas}}">
            </div>
            @php
                // Nama Kategori
                foreach ($suratMasuk as $kat) {
                    $id_kat = $suratMasuk -> id_kategori;
                    foreach ($kategori as $kat) {
                        if ($id_kat == $kat -> id) {
                            $nama_kat = $kat -> kategori;
                        }
                    }
                }
                // Nama unit
                foreach ($suratMasuk as $unt) {
                    $id_un = $suratMasuk -> id_unit;
                    foreach ($unit as $unt) {
                        if ($id_un == $unt -> id) {
                            $nama_unt = $unt -> unit;
                        }
                    }
                }
                // Nama pengirim                
                foreach ($suratMasuk as $sm) {
                    $surat_masuk = $suratMasuk -> email_pengirim;
                    foreach ($users as $u) {
                        if ($surat_masuk == $u -> email) {
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
                <div>
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
                            <label class="font-normal">Pengirim Surat</label>
                            <p class="font-semibold break-words">{{$suratMasuk -> email_pengirim}}</p>
                            <p class="font-semibold break-words">{{$pengirim}}</p>
                        </div>
                    </div>
                    <div class="w-full my-4">
                        <label class="font-normal">Tujuan Surat</label>
                        <p class="font-semibold break-words">{{$suratMasuk -> email_tujuan}}</p>
                    </div>
                    <div class="w-full my-4">
                        <label class="font-normal">Perihal / Subjek</label>
                        <p class="font-semibold break-words">{{$suratMasuk -> perihal}}</p>
                    </div>
                    <div class="w-full my-4">
                        <label class="font-normal">Keterangan Surat</label>
                        <p class="font-semibold break-words">{{$suratMasuk -> keterangan}}</p>
                    </div>
                    <div class="w-full my-4">
                        <label class="font-normal">Status Surat</label>
                        <p class="status_green text-center font-semibold break-words">{{$suratMasuk -> status}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection