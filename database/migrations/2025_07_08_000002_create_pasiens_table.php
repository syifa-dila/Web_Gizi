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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 100)->nullable(); 
            $table->string('gender', 10)->nullable(); 
            $table->date('birth_date')->nullable(); 
            $table->string('motherName', 100)->nullable();
            $table->string('fatherName', 100)->nullable();
            $table->string('address', 255)->nullable(); 
            $table->string('noKK', 17)->nullable(); 
            $table->string('phone_number', 13)->nullable(); 
            $table->string('medical_History', 50)->nullable();
            $table->string('medical_Alergi', 50)->nullable(); 
            $table->string('drug_allergy', 50)->nullable();
            $table->string('body_weight', 10)->nullable();
            $table->string('height', 10)->nullable(); 
            $table->unsignedBigInteger('user_id');
            $table->timestamps(); 

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
