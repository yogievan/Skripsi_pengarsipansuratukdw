@extends('layouts.main')
@section('web_title', 'Dashboard Admin')
@section('menu')
    @include('layouts.menu.admin')
@endsection
@section('content_tittle', 'Dashboard')
@section('content')
<div>
    @if (session('success_message'))
        <div class="alert alert-success">
            {{ session('success_message') }}
        </div>
    @endif
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-white rounded shadow p-3 w-[250px] border border-l-4 border-l-blue-800">
            <div>
                <p class="text-[16px] font-semibold">Total Surat Masuk</p>
            </div>
            <div class="ml-auto">
                <p class="font-bold text-[24px] break-words">
                    Nominal Surat
                </p>
            </div>
        </div>
        <div class="bg-white rounded shadow p-3 w-[250px] border border-l-4 border-l-yellow-400">
            <div>
                <p class="text-[16px] font-semibold">Total Surat Keluar</p>
            </div>
            <div class="ml-auto">
                <p class="font-bold text-[24px] break-words">
                    Nominal Surat
                </p>
            </div>
        </div>
        <div class="bg-white rounded shadow p-3 w-[250px] border border-l-4 border-l-red-600">
            <div>
                <p class="text-[16px] font-semibold">Total Surat Disposisi</p>
            </div>
            <div class="ml-auto">
                <p class="font-bold text-[24px] break-words">
                    Nominal Surat
                </p>
            </div>
        </div>
    </div>
</div>
@endsection