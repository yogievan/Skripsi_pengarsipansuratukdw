@extends('layouts.main')
@section('web_title', 'Surat Masuk')
@section('menu')
    @include('layouts.menu.sekretariat')
@endsection
@section('content_tittle', 'Tambah Surat Masuk')
@section('content')
<div>
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
        <p class="text-gray-500 mt-5">
            *Note: Pastikan Berkas yang di Upload sudah sesuai!
        </p>
    </form>
</div>
@endsection