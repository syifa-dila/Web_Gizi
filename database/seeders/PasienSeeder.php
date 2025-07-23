<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pasiens')->insert([
            'user_id' => 1, // Sesuaikan dengan user yang sudah ada di tabel 'users'
            'name' => 'Budi Santoso',
            'gender' => 'Laki-laki',
            'birth_date' => '2020-04-15',
            'motherName' => 'Mawar',
            'fatherName' => 'yaya',
            'address' => 'Jl. Melati No. 123, Jakarta',
            'noKK' => '0999999999999999',
            'phone_number' => '090000000000',
            'medical_History' => 'tidak ada',
            'medical_Alergi' => 'tidak ada',
            'drug_allergy' => 'tidak ada',
            'body_weight' => '10',
            'height' => '100',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
