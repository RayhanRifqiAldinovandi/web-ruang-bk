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
        Schema::create('laporan_konselings', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kelas');
            $table->date('tanggal');
            $table->integer('pertemuan_ke');
            $table->time('waktu')->format('H:i:s');
            $table->string('tempat');
            $table->string('teknik_konseling')->nullable();
            $table->text('penjelasan')->nullable();
            $table->text('hasil')->nullable();
            $table->text('gejala')->nullable();
            $table->string('tipe_dokumen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_konselings');
    }
};
