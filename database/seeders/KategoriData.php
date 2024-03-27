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
            ],
            [
                'kategori'=>'Surat Undangan',
            ],
            [
                'kategori'=>'Surat Edaran',
            ],
            [
                'kategori'=>'Surat Permohonan',
            ],
            [
                'kategori'=>'Surat Keputusan',
            ],
            [
                'kategori'=>'Surat Pengantar',
            ],
            
        ];
        foreach($data as $val){
            DB::table('kategori')->insert($val);
        }
    }
}
