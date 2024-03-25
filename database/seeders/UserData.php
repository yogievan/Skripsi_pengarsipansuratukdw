<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataPengguna = [
            [	
                'nama' => 'Kepala Bidang Unit',
                'email' => 'yogievan32@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'KepalaBidang',
                'desc_jabatan' => 'Rektor',
                'id_unit' => '1',
            ],
            [	
                'nama' => 'Dosen FTI',
                'email' => 'yogi.evan@si.ukdw.ac.id',
                'password' => bcrypt('123'),
                'role' => 'DosenStaff',
                'desc_jabatan' => 'Dosen/Staf Prodi Sistem Informasi',
                'id_unit' => '2',
            ],
            [	
                'nama' => 'Sekretariat Rektorat',
                'email' => 'yogievan400@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'Sekretariat',
                'desc_jabatan' => 'Sekretariat Rektorat',
                'id_unit' => '1',
            ],
        ];

        foreach($dataPengguna as $val){
            DB::table('users')->insert($val);
        }
    }
}
