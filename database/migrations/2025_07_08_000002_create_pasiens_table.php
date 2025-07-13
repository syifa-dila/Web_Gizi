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
            $table->id(); // primary key
            $table->string('name', 25); // nama pasien
            $table->string('gender', 10); // Laki-laki / Perempuan
            $table->date('birth_date'); // tanggal lahir — gunakan tipe date
            $table->string('motherName', 25);
            $table->string('fatherName', 25);
            $table->string('address', 100); // alamat — lebih fleksibel
            $table->string('noKK', 17); // nomor kartu keluarga
            $table->string('phone_number', 13); // no HP
            $table->string('medical_History', 50); // riwayat medis
            $table->string('medical_Alergi', 50); // alergi medis
            $table->string('drug_allergy', 50); // alergi obat
            $table->string('body_weight', 10); // berat badan (kg)
            $table->string('height', 10); // tinggi badan (cm)
            $table->timestamps(); // created_at dan updated_at
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
