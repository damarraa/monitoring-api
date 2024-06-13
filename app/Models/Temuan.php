<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temuan extends Model
{
    use HasFactory;

    public $table = 'temuans';

    public $fillable = [
        'lokasi_feeder',
        'no_pole',
        'equipment_type',
        'finding',
        'gambar'
    ];
}
