@extends('layouts.main')
@section('web_title', 'Kelola Pengguna')
@section('menu')
    @include('layouts.menu.admin')
@endsection
@section('content_tittle', 'Tambah Pengguna')
@section('content')
    <form action="">
        @csrf
        <div class="grid grid-cols-3 gap-6">
            <div class="col-span-2">
                <div class="py-2">
                    <label>Nama Lengkap</label>
                    <input type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                </div>
                <div class="py-2">
                    <label>Email</label>
                    <input type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                </div>
                <div class="py-2">
                    <label>Password</label>
                    <input type="password" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                </div>
            </div>
            <div>
                <div class="py-2">
                    <label>Role / Jabatan</label>
                    <select class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                        <option selected>Pilih Role</option>
                        <option value="KepalaBidang">Kepala Bidang</option>
                        <option value="DosenStaff">Dosen atau Staff</option>
                        <option value="Sekretariat">Sekretariat</option>
                    </select>
                </div>
                <div class="py-2">
                    <label>Deskripsi Jabatan</label>
                    <input type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500">
                </div>
                <div class="py-2">
                    <label>Unit</label>
                    <select class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                        <option selected>Pilih Unit</option>
                        <option value="US">Fakultas Kedokteran</option>
                    </select>
                </div>
            </div>
        </div>
        <div>
            <a href="">
                <button class="bg-[#006B3F] p-3 rounded text-white font-semibold mt-3 hover:bg-[#1c9e68]">Buat Akun</button>
            </a>
        </div>
    </form>
@endsection