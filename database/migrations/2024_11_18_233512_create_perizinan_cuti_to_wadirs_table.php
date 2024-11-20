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
        Schema::create('perizinan_cuti_to_wadirs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("perizinan_cuti_id")->nullable();
            $table->unsignedBigInteger("wadir_id")->nullable();

            $table->foreign('perizinan_cuti_id')->references('id')->on('perizinan_cutis');
            $table->foreign('wadir_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perizinan_cuti_to_wadirs');
    }
};
