<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporanKonselingKelompok extends Model
{
    use HasFactory;
    protected $table = "rpls";
    protected $fillable = [
        'nama_siswa',
        'tanggal_kegiatan',
        'pertemuan_ke',
        'waktu',
        'tempat',
        'topik_permasalahan',
        'media',
        'tipe_dokumen',
    ];
}
