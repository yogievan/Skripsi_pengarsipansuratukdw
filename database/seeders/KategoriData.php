<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori'=>'Surat Tugas/Dinas',
                'deskripsi'=>'Surat yang digunakan untuk menugaskan Perorangan baik Dosen ataupun Staff dalam unit tertentu.',
            ],
            [
                'kategori'=>'Surat Undangan',
                'deskripsi'=>'Surat yang digunakan untuk memanggil atau menggundang pihak tertentu dalam suatu kegiatan',
            ],
            [
                'kategori'=>'Surat Edaran',
                'deskripsi'=>'Surat yang digunakan untuk memberitahukan sebuah informasi atau penggumuman kepada kalangan tertentu.',
            ],
            [
                'kategori'=>'Surat Permohonan',
                'deskripsi'=>'Surat yang digunakan untuk mengajukan permohonan.',

            ],
            [
                'kategori'=>'Surat Peringatan',
                'deskripsi'=>'Surat yang digunakan untuk memberikan informasi peringatan terhadap peanggaran yang dilakukan.',
            ],
            
        ];
        foreach($data as $val){
            DB::table('kategori')->insert($val);
        }
    }
}
