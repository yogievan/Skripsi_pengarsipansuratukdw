<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataPengguna = [
            [
                'unit'=>'Rektorat',
            ],
            [
                'unit'=>'Fakultas Teknologi Informasi',
            ],
        ];
        foreach($dataPengguna as $val){
            DB::table('unit')->insert($val);
        }
    }
}
