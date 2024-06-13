<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->increments('pemeriksaan_id');
            $table->string('lokasi_feeder');
            $table->string('no_pole');
            $table->string('kondisi_no_pole');
            $table->string('level_hca');
            $table->string('koordinat_north');
            $table->string('koordinat_east');
            $table->string('tipe_tiang');
            $table->string('kondisi_bagian_atas');
            $table->string('kondisi_bagian_bawah');
            $table->string('kondisi_cross_arm');
            $table->string('kondisi_guy_pole');
            $table->string('kondisi_tanah');
            $table->string('kemiringan_tanah');
            $table->string('tiang_sleeve');
            $table->string('peralatan_tiang');
            $table->string('kondisi_tiang');
            $table->string('serial_number_tiang');
            $table->string('kapasitas_tiang');
            $table->string('tipe_pin_insulator');
            $table->string('kondisi_pin_insulator');
            $table->string('jumlah_pin_insulator');
            $table->string('kondisi_dead_end_insulator');
            $table->string('jumlah_dead_end_insulator');
            $table->string('kondisi_suspension_insulator');
            $table->string('jumlah_suspension_insulator');
            $table->string('tipe_lightning_arrester');
            $table->string('kondisi_lightning_arrester');
            $table->string('jumlah_lightning_arrester');
            $table->string('kondisi_kawat_guy');
            $table->string('jumlah_kawat_guy');
            $table->string('kondisi_static_wire');
            $table->string('kondisi_fiber_optic');
            $table->string('kondisi_pole_guard');
            $table->string('jumlah_pole_guard');
            $table->string('tipe_tumbuhan');
            $table->string('tinggi_tumbuhan');
            $table->string('jumlah_tumbuhan');
            $table->string('tipe_lec');
            $table->string('jumlah_lec');
            $table->string('akses_pekerja');
            $table->string('akses_kendaraan_besar');
            $table->string('akses_kendaraan_kecil');
            $table->string('kondisi_stiker_peringatan');
            $table->string('kondisi_papan_peringatan_publik');
            $table->string('jumlah_papan_peringatan_publik');
            $table->string('kondisi_papan_peringatan_bahaya');
            $table->string('jumlah_papan_peringatan_bahaya');
            $table->string('kondisi_kawat_duri');
            $table->string('aktifitas_konduktor');
            $table->string('tipe_konduktor');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaans');
    }
};
