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
        Schema::create('riwayat_pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('bidang_usaha');
            $table->string('jenis_pekerjaan');
            $table->string('jabatan');
            $table->string('instansi');
            $table->string('divisi');
            $table->string('deskripsi_kerja');
            $table->string('mulai_bekerja');
            $table->string('selesai_bekerja');
            $table->string('area_pekerjaan');
            $table->string('file_pendukung')->nullable();
            $table->string('status')->default('pengajuan');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pekerjaans');
    }
};
