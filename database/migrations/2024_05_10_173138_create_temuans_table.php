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
        Schema::create('temuans', function (Blueprint $table) {
            $table->increments('temuan_id');
            $table->string('lokasi_feeder');
            $table->string('no_pole');
            $table->string('equipment_type');
            $table->string('finding');
            $table->string('gambar')->nullable();
            $table->enum('status', ['Open', 'Closed'])->default('Open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temuans');
    }
};
