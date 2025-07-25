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
            $table->unsignedBigInteger('pasiens_id');
            $table->unsignedBigInteger('diseases_id');
            $table->unsignedBigInteger('result_cf_id');
            $table->unsignedBigInteger('rules_id');
            $table->decimal('cf_value', 5,2); 

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
