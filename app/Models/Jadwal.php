<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    public $table = 'jadwals';

    public $fillable = [
        'awal_pemeriksaan',
        'batas_pemeriksaan',
        'lokasi_feeder',
        'status'
    ];
}
