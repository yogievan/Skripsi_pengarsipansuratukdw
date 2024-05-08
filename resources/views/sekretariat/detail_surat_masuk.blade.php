@extends('layouts.main')
@section('web_title', 'Arsip Surat')
@section('menu')
    @include('layouts.menu.sekretariat')
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
            <p class="ml-auto my-auto font-bold">Surat Dibuat: {{$suratMasuk -> created_at}}</p>
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
                        <label class="font-normal">Perihal / Subjek</label>
                        <p class="font-semibold break-words">{{$suratMasuk -> perihal}}</p>
                    </div>
                    <div class="w-full my-4">
                        <label class="font-normal">Keterangan Surat</label>
                        <p class="font-semibold break-words">{{$suratMasuk -> keterangan}}</p>
                    </div>
                    <div class="w-full my-4">
                        <label class="font-normal">Status Surat</label>
                        <p class="font-semibold break-words">{{$suratMasuk -> status}}</p>
                    </div>
                    <div class="my-2">
                        <a href="/Sekretariat/UpdateDetailArsipSuratMasuk-{{ $suratMasuk -> id }}">
                            <button class="bg-blue-700 p-3 rounded text-white font-semibold m-auto w-full hover:bg-blue-600" onclick="return confirm('Apakah Surat akan divalidasi?')">Validasi Surat</button>
                        </a>
                    </div>
                </div>
                <hr class="my-5">
                <div class="my-2">
                    <button data-modal-target="tambah_arsip_surat_keluar" data-modal-toggle="tambah_arsip_surat_keluar" class="bg-[#006B3F] p-3 rounded text-white font-semibold m-auto w-full hover:bg-[#018951]">Buat Surat Keluar</button>
                </div>
                <div class="my-2">
                    <button data-modal-target="tambah_disposisi_surat_masuk" data-modal-toggle="tambah_disposisi_surat_masuk" class="bg-[#006B3F] p-3 rounded text-white font-semibold m-auto w-full hover:bg-[#018951]">Buat Disposisi Surat Masuk</button>
                </div>
                <hr class="my-5">
                <div>
                    <a href="/Sekretariat/HapusArsipSuratMasuk-{{ $suratMasuk -> id }}">
                        <button class="bg-red-600 p-3 rounded text-white font-semibold m-auto w-full hover:bg-red-500" onclick="return confirm('Apakah Surat akan dihapus?')">Hapus Surat</button>
                    </a>
                </div>
            </div>

            {{-- Modal Buat surat keluar --}}
            <div id="tambah_arsip_surat_keluar" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-[1000px] max-h-full">
                    <div class="relative bg-white rounded-lg shadow p-4">
                        {{-- head modal --}}
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Arsipkan Surat Keluar
                            </h3>
                            <button data-modal-toggle="tambah_arsip_surat_keluar" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        {{-- body modal --}}
                        <form action="{{route('TambahArsipSuratKeluar_sekretariat')}}" method="post">
                            @csrf
                            <div class="my-2">
                                <label class="font-semibold">Kode Surat</label>
                                <input name="kode_surat" type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                            </div>
                            <div class="grid grid-cols-3 gap-2 my-2">
                                <div class="col-span-1">
                                    <label class="font-semibold">Kategori Surat</label>
                                    <div class="flex gap-2">
                                        <select name="id_kategori" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                            <option>Pilih Kategori Surat</option>
                                            @foreach ($kategori as $item)
                                                @if ($suratMasuk -> id_kategori == $item -> id)
                                                    <option selected value="{{ $item -> id }}">{{ $item -> kategori }}</option>
                                                @else
                                                    <option value="{{ $item -> id }}">{{ $item -> kategori }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <i data-popover-target="info-kategori" class="fas fa-info-circle text-xl m-auto"></i>
                                        {{-- pop up content --}}
                                        <div data-popover id="info-kategori" role="tooltip" class="absolute z-10 invisible inline-block w-[400px] text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
                                            <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg">
                                                <h3 class="font-semibold text-gray-900 dark:text-white">Informasi</h3>
                                            </div>
                                            <div class="px-3 py-2">
                                                @foreach ($kategori as $item)
                                                <b>{{ $item -> kategori }}</b> : {{ $item -> deskripsi }} <br>
                                                @endforeach
                                            </div>
                                            <div data-popper-arrow></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-2">
                                    <label class="font-semibold">Unit Pengirim</label>
                                    <select name="id_unit" class="bg-white p-2 rounded outline-none w-full font-normal focus:ring-green-500 focus:border-green-500" required>
                                        <option>Pilih Unit Pengirim</option>
                                        @foreach ($unit as $item)
                                            @if ($suratMasuk -> id_unit == $item -> id)
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
                                <input name="email_tujuan" type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                            </div>
                            <div class="my-2">
                                <label class="font-semibold">Perihal / Subjek</label>
                                <input name="perihal" value="{{ $suratMasuk -> perihal }}" type="text" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" placeholder="Subjek:" required>
                            </div>
                            <div class="my-2">
                                <label class="font-semibold">Keterangan</label><br>
                                <textarea name="keterangan"  class="block bg-white w-full h-[200px] rounded font-normal focus:ring-green-500 focus:border-green-500">{{ $suratMasuk -> keterangan }}</textarea>
                            </div>
                            <div class="my-2">
                                <label class="font-semibold">Upload Berkas Surat</label>
                                <input name="berkas" class="block w-[50%] text-sm text-gray-500 border border-[#006B3F] rounded cursor-pointer bg-white focus:outline-none" type="file">
                                Nama Berkas Sebelumnya: {{ $suratMasuk -> berkas }}
                            </div>
                            <div class="mt-[30px]">
                                <Button class="bg-[#006B3F] p-3 rounded text-white w-[200px] font-semibold hover:bg-[#018951]" onclick="return confirm('Apakah Data telah diisi dengan benar?')">Simpan & Kirim</Button>
                            </div>
                            <p class="text-red-600 mt-1 font-normal">
                                *Note: Pastikan Berkas yang di Upload sudah sesuai!
                            </p>
                            <input name="status" type="text" value="Tervalidasi Sekretariat" hidden>
                            @php
                                $email = Auth::user()->email;
                            @endphp
                            <input name="email_pengarsip" type="email" value="{{ $email }}" hidden>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Modal Buat disposisi surat masuk --}}
            <div id="tambah_disposisi_surat_masuk" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-[1000px] max-h-full">
                    <div class="relative bg-white rounded-lg shadow p-4">
                        {{-- head modal --}}
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Buat Disposisi Surat Masuk
                            </h3>
                            <button data-modal-toggle="tambah_disposisi_surat_masuk" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        {{-- body modal --}}
                        <form action="{{ route('TambahArsipDisposisiSuratMasuk_sekretariat') }}" method="POST">
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
                                <input name="email_tujuan" type="email" class="block bg-white rounded w-full outline-none p-2 font-normal focus:ring-green-500 focus:border-green-500" required>
                            </div>
                            <div class="my-2">
                                <label class="font-semibold">Catatan</label><br>
                                <textarea name="catatan"  class="block bg-white w-full h-[200px] rounded font-normal focus:ring-green-500 focus:border-green-500">{{ $suratMasuk -> keterangan }}</textarea>
                            </div>
                            <div class="my-2">
                                <label class="font-semibold">Upload Berkas Surat</label>
                                <input name="lampiran" class="block w-[50%] text-sm text-gray-500 border border-[#006B3F] rounded cursor-pointer bg-white focus:outline-none" type="file" required>
                                Nama Berkas Sebelumnya: {{ $suratMasuk -> berkas }}
                            </div>
                            <div class="mt-[30px]">
                                <Button class="bg-[#006B3F] p-3 rounded text-white w-[200px] font-semibold hover:bg-[#018951]" onclick="return confirm('Apakah Data telah diisi dengan benar?')">Simpan & Kirim</Button>
                            </div>
                            <p class="text-red-600 mt-1 font-normal">
                                *Note: Pastikan Berkas yang di Upload sudah sesuai!
                            </p>
                            <input name="id_surat_masuk" type="number" value={{ $suratMasuk -> id }} hidden>
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