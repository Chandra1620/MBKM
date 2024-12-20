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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->string('email')->unique();
            $table->string('nip')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('jenis_kelamin', ['l','p'])->default('l');
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('nama_ibu')->nullable();
            // $table->string('file_pendukung')->nullable();
            $table->string('role');
            $table->string('role_khusus_1')->nullable();
            $table->string('role_khusus_2')->nullable();
            $table->string('jabatan')->nullable();
            // $table->string('jabatan_atasan_langsung')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

