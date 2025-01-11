<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rpl extends Model
{
    use HasFactory;
    protected $table = 'rpls'; 
    protected $fillable = [
        'waktu',
        'kelas',
        'tanggal_kegiatan',
        'layanan',
        'month',
        'tindak_lanjut',
        'keterangan',
        'jenis_pelanggaran',
        'nama_siswa',
        'deskripsi_pelanggaran',
        'tipe_dokumen',
        'pertemuan_ke',
        'tempat',
        'gejala',
        'media',
        'topik_permasalahan'
    ];
}
