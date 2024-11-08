<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sisa_cutis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('n')->default(0)->comment('Sisa cuti tahun N');
            $table->integer('n_minus_1')->default(0)->comment('Sisa cuti tahun N-1');
            $table->integer('n_minus_2')->default(0)->comment('Sisa cuti tahun N-2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sisa_cutis');
    }
};
