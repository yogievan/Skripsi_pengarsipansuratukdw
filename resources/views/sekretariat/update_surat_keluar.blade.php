@extends('layouts.main')
@section('web_title', 'Arsip Surat')
@section('menu')
    @include('layouts.menu.sekretariat')
@endsection
@section('content_tittle', 'Edit Arsip Surat Masuk')
@section('content')
<div class="flex gap-5 mb-3">
    <a href="{{ URL::previous() }}">
        <button class="p-2 bg-slate-600 text-white rounded-md text-[18px] my-auto">
            <i class="fas fa-angle-double-left text-[18px] my-auto"></i> Back
        </button>
    </a>
    <p class="ml-auto my-auto font-bold">Terakhir diperbarui: {{$suratKeluar -> updated_at}}</p>
</div>
<form action="/Sekretariat/EditArsipSuratKeluarSubmit-{{ $suratKeluar -> id }}" method="Post">
    @csrf
    @method('put')
    <div class="my-2">
        <label class="font-semibold">Kode Surat</label>
        <input value="{{ $suratKeluar -> kode_surat}}" name="kode_surat" type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
    </div>
    <div class="grid grid-cols-3 gap-4 my-2">
        <div class="col-span-1">
            <label class="font-semibold">Kategori Surat</label>
            <select name="id_kategori" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                <option>Pilih Kategori Surat</option>
                @foreach ($kategori as $item)
                    @if ($suratKeluar -> id_kategori == $item -> id)
                        <option selected value="{{ $item -> id }}">{{ $item -> kategori }}</option>
                    @else
                        <option value="{{ $item -> id }}">{{ $item -> kategori }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-span-2">
            <label class="font-semibold">Unit Pengirim</label>
            <select name="id_unit" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                <option>Pilih Unit Pengirim</option>
                @foreach ($unit as $item)
                    @if ($suratKeluar -> id_unit == $item -> id)
                        <option selected value="{{ $item -> id }}">{{ $item -> unit }}</option>
                    @else
                        <option value="{{ $item -> id }}">{{ $item -> unit }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="my-2">
        <label class="font-semibold">Tujuan Surat</label>
        <input name="email_tujuan" value="{{ $suratKeluar -> email_tujuan }}" type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
    </div>
    <div class="my-2">
        <label class="font-semibold">Perihal / Subjek</label>
        <input name="perihal" value="{{ $suratKeluar -> perihal }}" type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" placeholder="Subjek:" required>
    </div>
    <div class="my-2">
        <label class="font-semibold">Keterangan</label><br>
        <textarea name="keterangan" class="block bg-white w-full h-[200px] rounded font-normal focus:ring-green-500 focus:border-green-500">{{ $suratKeluar -> keterangan }}</textarea>
    </div>
    <div class="my-2">
        <label class="font-semibold">Upload Berkas Surat</label>
        <input name="berkas" class="block w-[50%] text-sm text-gray-500 border border-[#006B3F] rounded cursor-pointer bg-white focus:outline-none" type="file" required>Nama Berkas Sebelumnya: {{ $suratKeluar -> berkas }}
    </div>
    <div class="mt-[30px]">
        <Button class="bg-[#006B3F] p-3 rounded text-white w-[200px] font-semibold hover:bg-[#018951]" onclick="return confirm('Apakah Data telah diisi dengan benar?')">Simpan & Kirim</Button>
    </div>
    <p class="text-red-600 mt-1 font-normal">
        *Note: Pastikan Berkas yang di Upload sudah sesuai!
    </p>
    <input name="status" type="text" value="Tervalidasi Sekretariat" hidden>
</form>
@endsection