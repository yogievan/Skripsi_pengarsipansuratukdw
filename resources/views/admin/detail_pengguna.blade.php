@extends('layouts.main')
@section('web_title', 'Detail Pengguna')
@section('menu')
    @include('layouts.menu.admin')
@endsection
@section('content_tittle', 'Detail Pengguna')
@section('content')
<div class="grid grid-cols-3">
    <div class="col-span-3">
        <div class="py-2">
            <label class="font-normal">Nama Lengkap</label>
            <p class="text-[20px] break-words">{{ $user -> nama }}</p>
        </div>
        <div class="py-2">
            <label class="font-normal">Email</label>
            <p class="text-[20px] break-words">{{ $user -> email }}</p>
        </div>
        <div class="py-2">
            <label class="font-normal">Username</label>
            <p class="text-[20px] break-words">{{ $user -> username }}</p>
        </div>
        <div class="py-2">
            <label class="font-normal">Unit</label>
            <p class="text-[20px] break-words">{{ $user -> id_unit }}</p>
        </div>
        <div class="py-2">
            <label class="font-normal">Role / Jabatan</label>
            <p class="text-[20px] break-words">{{ $user -> role }}</p>
        </div>
        <div class="py-2">
            <label class="font-normal">Deskripsi Jabatan</label>
            <p class="text-[20px] break-words">{{ $user -> id_jabatan }}</p>
        </div>
    </div>
</div>
@endsection