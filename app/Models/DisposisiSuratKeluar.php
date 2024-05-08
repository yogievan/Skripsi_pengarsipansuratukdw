<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisposisiSuratKeluar extends Model
{
    use HasFactory;
    protected $table = 'disposisi_surat_keluar';
    protected $fillable = [
        'id_sifat',
        'id_surat_keluar',
        'email_tujuan',
        'catatan',
        'lampiran',
        'status',
        'email_pengarsip',
    ];
}
