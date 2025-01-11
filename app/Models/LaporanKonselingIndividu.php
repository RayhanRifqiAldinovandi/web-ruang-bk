<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKonselingIndividu extends Model
{
    use HasFactory;
    protected $table = "laporan_konselings";
    protected $fillable = [
        'nama',
        'kelas',
        'tanggal',
        'pertemuan_ke',
        'waktu',
        'tempat',
        'teknik_konseling',
        'penjelasan',
        'hasil',
        'gejala',
        'tipe_dokumen',
    ];
}
