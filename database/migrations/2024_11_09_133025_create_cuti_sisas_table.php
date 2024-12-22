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
        Schema::create('cuti_sisas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('n')->default(12)->comment('Sisa cuti tahun N');
            $table->integer('n_minus_1')->default(0)->comment('Sisa cuti tahun N-1');
            $table->integer('n_minus_2')->default(0)->comment('Sisa cuti tahun N-2');
            $table->integer("cuti_dipakai")->default(0);
            $table->timestamp("waktu_mulai_pergantian")->nullable()->useCurrent();
            $table->timestamp("waktu_selesai_pergantian")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuti_sisas');
    }
};
