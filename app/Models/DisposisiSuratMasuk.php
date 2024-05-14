<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisposisiSuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'disposisi_surat_masuk';
    protected $fillable = [
        'id_sifat',
        'id_surat_masuk',
        'email_pengirim',
        'email_tujuan',
        'catatan',
        'lampiran',
        'status',
        'email_pengarsip',
    ];
}
