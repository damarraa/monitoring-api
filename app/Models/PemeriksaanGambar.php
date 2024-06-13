<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanGambar extends Model
{
    use HasFactory;

    public $table = 'pemeriksaan_gambars';

    public $fillable = [
        'pemeriksaan_id',
        'foto_finding'
    ];
}
