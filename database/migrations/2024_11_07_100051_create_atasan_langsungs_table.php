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
        Schema::create('atasan_langsung', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedBigInteger("user_has_atasan_id")->nullable();
            $table->unsignedBigInteger("atasan_has_wadir_id")->nullable();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_has_atasan_id')->references('id')->on('users');
            $table->foreign('atasan_has_wadir_id')->references('id')->on('users');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atasan_langsung');
    }
};
