<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $fillable = ['kode_pengunjung', 'nama', 'tanggal'];
} 