<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['nim','nama','tanggal_lahir', 'alamat', 'jurusan', 'jenis_kelamis'];
}