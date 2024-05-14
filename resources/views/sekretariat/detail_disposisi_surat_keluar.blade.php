@extends('layouts.main')
@section('web_title', 'Detail Disposisi Surat Keluar')
@section('menu')
    @include('layouts.menu.sekretariat')
@endsection
@section('content_tittle', 'Detail Disposisi Surat Keluar')
@section('content')
    <div>
        <div class="flex gap-5 mb-3">
            <a href="{{ URL::previous() }}">
                <button class="p-2 bg-slate-600 text-white rounded-md text-[18px] my-auto">
                    <i class="fas fa-angle-double-left text-[18px] my-auto"></i> Back
                </button>
            </a>
            <p class="ml-auto my-auto font-bold">Surat Disposisi dibuat: {{$disposisiSuratKeluar -> created_at}}</p>
        </div>
        <div class="grid grid-cols-3 gap-5">
            <div class="col-span-2">
                <p class="font-normal mb-1">Lampiran: {{$disposisiSuratKeluar -> lampiran}}</p>
                <embed class="w-[100%] h-auto min-h-[500px] desktop:min-h-[800px] rounded-md" src="../arsip/{{$disposisiSuratKeluar -> lampiran}}">
            </div>
            
            @php
                // Nama sifat
                foreach ($disposisiSuratKeluar as $dsm) {
                    $id_sifat = $disposisiSuratKeluar -> id_sifat;
                    foreach ($sifat as $dsm) {
                        if ($id_sifat == $dsm -> id) {
                            $ket_sifat = $dsm -> sifat_surat;
                        }
                    }
                }
            @endphp
            <div class="col-span-1">
                @php
                    foreach ($disposisiSuratKeluar as $sm) {
                        $surat_masuk = $disposisiSuratKeluar -> email_pengarsip;
                        foreach ($users as $u) {
                            if ($surat_masuk == $u -> email) {
                                $pengarsip = $u -> nama;
                            }
                        }
                    }
                @endphp
                <p class="text-right font-normal break-words mb-1">Diarsipkan oleh <b>{{$pengarsip}}</b> ({{$disposisiSuratKeluar -> email_pengarsip}})</p>
                <div class="bg-white border rounded-md shadow p-4 w-[100%]">
                    <p class="font-bold text-[18px]">
                        <i class="fas fa-info-circle"></i>
                        Deskripsi Surat
                    </p>
                    <hr class="my-2">
                    <div class="grid grid-cols-2 gap-2 mb-2">
                        <div>
                            <label class="font-normal">Sifat Surat</label>
                            <p class="font-semibold break-words">{{$ket_sifat}}</p>
                        </div>
                        <div class="text-right">
                            <label class="font-normal">ID Surat Masuk</label>
                            <p class="font-semibold break-words">{{ $disposisiSuratKeluar -> id_surat_masuk }}</p>
                        </div>
                    </div>
                    <div class="w-full my-4">
                        <label class="font-normal">Pengirim Surat</label>
                        <p class="font-semibold break-words">{{$disposisiSuratKeluar -> email_pengirim}}</p>
                    </div>
                    <div class="w-full my-4">
                        <label class="font-normal">Tujuan Surat</label>
                        <p class="font-semibold break-words">{{$disposisiSuratKeluar -> email_tujuan}}</p>
                    </div>
                    <div class="w-full my-4">
                        <label class="font-normal">Keterangan Surat</label>
                        <p class="font-semibold break-words">{{$disposisiSuratKeluar -> catatan}}</p>
                    </div>
                    <div class="w-full my-4">
                        <label class="font-normal">Status Surat</label>
                        <p class="font-semibold break-words">{{$disposisiSuratKeluar -> status}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection