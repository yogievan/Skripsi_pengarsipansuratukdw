@extends('layouts.main')
@section('web_title', 'Dashboard Dosen & Staff')
@section('menu')
    @include('layouts.menu.dosen_staff')
@endsection
@section('content_tittle', 'Dashboard')
@section('content')
<div class="grid grid-cols-3 gap-4">
    <div class="bg-white rounded shadow p-3 w-[250px] border">
        <div class="grid grid-cols-2">
            <div class="w-[120px]">
                <p class="text-lg font-medium">Total Surat Masuk</p>
            </div>
            <div class="ml-auto w-[80px]">
                <p class="font-bold text-lg break-words">
                    Nominal
                </p>
            </div>
        </div>
    </div>
    <div class="bg-white rounded shadow p-3 w-[250px] border">
        <div class="grid grid-cols-2">
            <div class="w-[120px]">
                <p class="text-lg font-medium">Total Surat Disposisi</p>
            </div>
            <div class="ml-auto w-[80px]">
                <p class="font-bold text-lg break-words">
                    Nominal
                </p>
            </div>
        </div>
    </div>
</div>
@endsection