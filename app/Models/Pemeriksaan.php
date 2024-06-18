<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaans';

    protected $primaryKey = 'pemeriksaan_id';

    protected $fillable = [
        'lokasi_feeder',
        'no_pole',
        'kondisi_no_pole',
        'level_hca',
        'koordinat_north',
        'koordinat_east',
        'tipe_tiang',
        'kondisi_bagian_atas',
        'kondisi_bagian_bawah',
        'kondisi_cross_arm',
        'kondisi_guy_pole',
        'kondisi_tanah',
        'kemiringan_tanah',
        'tiang_sleeve',
        'peralatan_tiang',
        'kondisi_tiang',
        'serial_number_tiang',
        'kapasitas_tiang',
        'tipe_pin_insulator',
        'kondisi_pin_insulator',
        'jumlah_pin_insulator',
        'kondisi_dead_end_insulator',
        'jumlah_dead_end_insulator',
        'kondisi_suspension_insulator',
        'jumlah_suspension_insulator',
        'tipe_lightning_arrester',
        'kondisi_lightning_arrester',
        'jumlah_lightning_arrester',
        'kondisi_kawat_guy',
        'jumlah_kawat_guy',
        'kondisi_static_wire',
        'kondisi_fiber_optic',
        'kondisi_pole_guard',
        'jumlah_pole_guard',
        'tipe_tumbuhan',
        'tinggi_tumbuhan',
        'jumlah_tumbuhan',
        'tipe_lec',
        'jumlah_lec',
        'akses_pekerja',
        'akses_kendaraan_besar',
        'akses_kendaraan_kecil',
        'kondisi_stiker_peringatan',
        'kondisi_papan_peringatan_publik',
        'jumlah_papan_peringatan_publik',
        'kondisi_papan_peringatan_bahaya',
        'jumlah_papan_peringatan_bahaya',
        'kondisi_kawat_duri',
        'aktifitas_konduktor',
        'tipe_konduktor',
        'foto_finding',
        'keterangan',
        'status'
    ];
}