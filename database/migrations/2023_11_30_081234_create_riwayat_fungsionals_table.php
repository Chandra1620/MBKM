<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat_fungsionals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('unit_kerja_has_jabatan_fungsional_id');
            $table->string('jabatan_fungsional')->nullable();
            $table->string('nomor_sk');
            $table->date('tanggal_mulai');
            $table->string('status')->default('pengajuan');
            $table->date('verifikasi_admin')->nullable();
            $table->string('dokumen_pendukung');
            $table->timestamps();


            $table->foreign('unit_kerja_has_jabatan_fungsional_id')->references('id')->on('unit_kerja_has_jabatan_fungsionals')->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('riwayat_fungsionals');
    }
};
