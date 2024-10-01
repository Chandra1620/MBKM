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
        Schema::create('pangkat_golongans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('pangkat_golongan');
            $table->string('nomor_sk');
            $table->string('tanggal_sk');
            $table->date('tanggal_mulai');
            $table->string('masakerja_tahun');
            $table->string('masakerja_bulan');
            $table->string('kredit');
            $table->string('status')->default('pengajuan');
            $table->date('verifikasi_admin')->nullable();
            $table->string('dokumen_pendukung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pangkat_golongans');
    }
};
