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
        Schema::create('surat_menyurats', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_surat');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('nomor_surat');
            $table->string('tempat_berangkat')->nullable();
            $table->string('tempat_tujuan')->nullable();
            $table->date('tgl_berangkat')->nullable();
            $table->date('tgl_kembali')->nullable();
            // $table->string('lama_dinas');
            $table->string('file_pendukung')->nullable();            
            $table->boolean('is_read')->default(false);
            $table->unsignedBigInteger('pengirim_id');
            $table->unsignedBigInteger('penerima_id')->nullable();
            $table->unsignedBigInteger('unit_kerja_id')->nullable();
            $table->timestamps();
        
            $table->foreign('pengirim_id')->references('id')->on('users');
            $table->foreign('penerima_id')->references('id')->on('users');
            $table->foreign('unit_kerja_id')->references('id')->on('unit_kerjas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_menyurats');
    }
};
