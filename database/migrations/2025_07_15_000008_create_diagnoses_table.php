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
        Schema::create('diagnoses', function (Blueprint $table) {
            $table->id();
            $table->string('code_diagnosis')->unique();
            $table->date('date');
            $table->string('result_diagnosis');
            $table->unsignedBigInteger('pasiens_id');
            $table->unsignedBigInteger('gejalas_id');
            $table->unsignedBigInteger('diseases_id');
            $table->unsignedBigInteger('rules_id');
            $table->timestamps();

            $table->foreign('pasiens_id')->references('id')->on('pasiens')->onDelete('cascade');
            $table->foreign('gejalas_id')->references('id')->on('gejalas')->onDelete('cascade');
            $table->foreign('diseases_id')->references('id')->on('diseases')->onDelete('cascade');
            $table->foreign('rules_id')->references('id')->on('rules')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnoses');
    }
};
