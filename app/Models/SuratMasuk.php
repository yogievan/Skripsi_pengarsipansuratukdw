<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';
    protected $fillable = [
        'id_kategori',
        'id_unit',
        'email_pengirim',
        'email_tujuan',
        'perihal',
        'keterangan',
        'berkas',
        'status',
        'email_pengarsip',
    ];
}
