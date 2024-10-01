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
        Schema::create('tes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_tes');
            $table->string('skor');
            $table->string('jenis_tes');
            $table->string('penyelenggara');
            $table->string('tahun');
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
        Schema::dropIfExists('tes');
    }
};
