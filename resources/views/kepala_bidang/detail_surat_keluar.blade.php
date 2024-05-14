@extends('layouts.main')
@section('web_title', 'Arsip Surat')
@section('menu')
    @include('layouts.menu.kepala_bidang')
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
            <p class="ml-auto my-auto font-bold">Surat dibuat: {{$suratKeluar -> created_at}}</p>
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
                            $penerima = $u -> nama;
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
                    <div class="w-full my-4">
                        <label class="font-normal">Pengirim Surat</label>
                        <p class="font-semibold break-words">{{$suratKeluar -> email_pengirim}}</p>
                    </div>
                    <div class="w-full grid grid-cols-2 gap-4 mb-2">
                        <div class="">
                            <label class="font-normal">Unit Pengirim</label>
                            <p class="font-semibold break-words">{{$nama_unt}}</p>
                        </div>
                        <div class="text-right">
                            <label class="font-normal">Tujuan Surat</label>
                            <p class="font-semibold break-words">{{$suratKeluar -> email_tujuan}}</p>
                            <p class="font-semibold break-words">{{$penerima}}</p>
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
                </div>
                <div class="my-2">
                    <button data-modal-target="tambah_disposisi_surat_keluar" data-modal-toggle="tambah_disposisi_surat_keluar" class="bg-[#006B3F] p-3 rounded text-white font-semibold m-auto w-full hover:bg-[#018951]" {{ $akses }}>Buat Disposisi Surat Keluar</button>
                </div>
            </div>
        </div>

        {{-- Modal Buat disposisi surat keluar --}}
        <div id="tambah_disposisi_surat_keluar" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-[1000px] max-h-full">
                <div class="relative bg-white rounded-lg shadow p-4">
                    {{-- head modal --}}
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Buat Disposisi Surat Keluar
                        </h3>
                        <button data-modal-toggle="tambah_disposisi_surat_keluar" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    {{-- body modal --}}
                    <form action="{{ route('TambahArsipDisposisiSuratKeluar_sekretariat') }}" method="POST">
                        @csrf
                        <div class="col-span-2">
                            <label class="font-semibold">Sifat Berkas</label>
                            <select name="id_sifat" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                <option selected>Pilih Sifat Berkas Disposisi</option>
                                @foreach ($sifat as $item)
                                    <option value="{{ $item -> id }}">{{ $item -> sifat_surat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-2">
                            <label class="font-semibold">Tujuan Surat</label>
                            <input name="email_tujuan" value="{{ $suratKeluar -> email_tujuan }}" type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                        </div>
                        <div class="my-2">
                            <label class="font-semibold">Catatan</label><br>
                            <textarea name="catatan"  class="block bg-white w-full h-[200px] rounded font-normal focus:ring-green-500 focus:border-green-500">{{ $suratKeluar -> keterangan }}</textarea>
                        </div>
                        <div class="my-2">
                            <label class="font-semibold">Upload Berkas Surat</label>
                            <input name="lampiran" class="block w-[50%] text-sm text-gray-500 border border-[#006B3F] rounded cursor-pointer bg-white focus:outline-none" type="file" required>
                            Nama Berkas Sebelumnya: {{ $suratKeluar -> berkas }}
                        </div>
                        <div class="mt-[30px]">
                            <Button class="bg-[#006B3F] p-3 rounded text-white w-[200px] font-semibold hover:bg-[#018951]" onclick="return confirm('Apakah Data telah diisi dengan benar?')">Simpan & Kirim</Button>
                        </div>
                        <p class="text-red-600 mt-1 font-normal">
                            *Note: Pastikan Berkas yang di Upload sudah sesuai!
                        </p>
                        <input name="id_surat_keluar" type="number" value={{ $suratKeluar -> id }} hidden>
                        <input name="status" type="text" value="Disposisi Dikirim" hidden>
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
@endsection