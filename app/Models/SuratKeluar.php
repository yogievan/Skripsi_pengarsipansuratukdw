<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';
    protected $fillable = [
        'id_kategori',
        'id_unit',
        'kode_surat',
        'email_tujuan',
        'perihal',
        'keterangan',
        'berkas',
        'status',
        'email_pengarsip',
    ];
}
