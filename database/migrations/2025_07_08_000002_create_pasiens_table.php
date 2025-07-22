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
            $table->string('name', 25); 
            $table->string('gender', 10); 
            $table->date('birth_date'); 
            $table->string('motherName', 25);
            $table->string('fatherName', 25);
            $table->string('address', 100); 
            $table->string('noKK', 17); 
            $table->string('phone_number', 13); 
            $table->string('medical_History', 50);
            $table->string('medical_Alergi', 50); 
            $table->string('drug_allergy', 50);
            $table->string('body_weight', 10);
            $table->string('height', 10); 
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
