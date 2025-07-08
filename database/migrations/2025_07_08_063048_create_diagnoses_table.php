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
            $table->string('recommendation')->nullable();
            $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('admin_id')->nullable();
            // $table->unsignedBigInteger('aturan_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('admin_id')->references('id')->on('admins')->onDelete('set null');
            // $table->foreign('aturan_id')->references('id')->on('aturan_cf')->onDelete('set null');
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
