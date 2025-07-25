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
        Schema::create('result_cf', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gejalas_id');
            $table->unsignedBigInteger('pasiens_id');
            $table->decimal('nilai_cf', 5,1); 

            $table->foreign('pasiens_id')->references('id')->on('pasiens')->onDelete('cascade');
            $table->foreign('gejalas_id')->references('id')->on('gejalas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('result_cf');
    }
};
