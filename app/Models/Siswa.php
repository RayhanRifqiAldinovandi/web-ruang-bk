<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa'; 
    public $timestamps = true;
    protected $fillable = ['nama_siswa','email','jenis_kelamin','kelas_id','nomor_ortu'];

    public function Kelas (): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }

}
