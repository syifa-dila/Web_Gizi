<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin
        $user = User::create([
            'name' => 'Dokter Meri',
            'email' => 'admingizi@gmail.com',
            'password' => Hash::make('password'),
            'birth_date' => '1998-07-23',
            'gender' => 'Perempuan',
            'phone_number' => '081234567890',
            'address' => 'Jl. Raya Jangari, Kademangan, Kec. Mande, Kabupaten Cianjur',
            'role_id' => 1, // diasumsikan 1 = admin
        ]);

        // Buat data admin terkait user tersebut
        Admin::create([
            'name' => 'Syifa Dilla',
            'position' => 'Kepala Puskesmas',
            'gender' => 'Perempuan',
            'birth_date' => '1998-07-23',
            'phone_number' => '081234567890',
            'address' => 'Jl. Sehat No.1, Bandung',
            'user_id' => $user->id, // foreign key ke users
        ]);
    }
}
