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

        ///ANYTHING CALLED RPL WILL BE STORED HERE
        ///DIFFERENTIATED BY tipe_dokumen
        Schema::create('rpls', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_kegiatan');
            $table->string('month')->nullable();
            $table->string('kelas')->nullable();
            $table->string('nama_siswa');
            $table->text('layanan')->nullable();
            $table->text('tindak_lanjut')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('deskripsi_pelanggaran')->nullable();
            $table->text('jenis_pelanggaran')->nullable();
            $table->integer('pertemuan_ke')->nullable();
            $table->time('waktu')->format('H:i:s')->nullable();
            $table->string('tempat')->nullable();
            $table->string('topik_permasalahan')->nullable();
            $table->text('media')->nullable();
            $table->string('tipe_dokumen');
            $table->string('teknik')->nullable();
            $table->string('penjelasan_teknik')->nullable();
            $table->text('gejala')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rpls');
    }
};
