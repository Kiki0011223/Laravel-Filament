<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;
    protected $fillable = [
        'nidn',
        'nama',
        'jenis_kelamin',
        'email',
        'no_hp',
        'jabatan_akademik'
    ];

    public function mataKuliah()
    {
        return $this->hasMany(Matkul::class, 'dosen_id');
    }
}