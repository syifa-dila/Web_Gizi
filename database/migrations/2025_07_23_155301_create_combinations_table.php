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
        Schema::create('combinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasiens_id')->nullable();
            $table->unsignedBigInteger('diseases_id')->nullable();
            $table->unsignedBigInteger('result_cf_id')->nullable();
            $table->unsignedBigInteger('rules_id')->nullable();
            $table->float('cf_value')->nullable(); // hasil CF akhir combine user & pakar

            $table->foreign('diseases_id')->references('id')->on('diseases')->onDelete('cascade');
            $table->foreign('result_cf_id')->references('id')->on('result_cf')->onDelete('cascade');
            $table->foreign('rules_id')->references('id')->on('rules')->onDelete('cascade');
            $table->foreign('pasiens_id')->references('id')->on('pasiens')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combinations');
    }
};
