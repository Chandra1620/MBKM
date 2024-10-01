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
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_surat');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('nomor_surat');
            $table->date('tgl_berangkat')->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->string('file_pendukung')->nullable();
            $table->unsignedBigInteger('pengirim_id');
            $table->unsignedBigInteger('ketua_id')->nullable();
            $table->json('anggota')->nullable();
            $table->timestamps();

            $table->foreign('pengirim_id')->references('id')->on('users');
            $table->foreign('ketua_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_tugas');
    }
};
