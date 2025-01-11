<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['kelas','tingkatan','kode_kelas'];

    public function Siswa () : HasMany
    {
        return $this->hasMany(Siswa::class);
    }
}
