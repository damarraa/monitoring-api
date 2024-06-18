<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temuan extends Model
{
    use HasFactory;

    protected $table = 'temuans';

    protected $primaryKey = 'temuan_id';

    protected $fillable = [
        'lokasi_feeder',
        'no_pole',
        'equipment_type',
        'finding',
        'gambar',
        'status'
    ];

    public $casts = [
        'gambar' => 'array'
    ];
}
