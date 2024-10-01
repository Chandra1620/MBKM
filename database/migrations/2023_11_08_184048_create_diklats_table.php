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
        Schema::create('diklats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('jenis');
            $table->string('nama');
            $table->string('penyelenggara');
            $table->string('peran');
            $table->string('tingkat_diklat');
            $table->integer('jumlah_jam');
            $table->string('no_sertifikat');
            $table->string('tgl_sertifikat');
            $table->string('tahun_penyelenggaraan');
            $table->string('tempat');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('nomor_sk_penugasan');
            $table->date('tanggal_sk_penugasan');
            $table->string('status')->default('pengajuan');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diklats');
    }
};
