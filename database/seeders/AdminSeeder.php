<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin
        $user = User::create([
            'name' => 'Syifa Dilla',
            'email' => 'admin@gizi.com',
            'password' => Hash::make('password123'),
            'birth_date' => '1998-07-23',
            'gender' => 'Perempuan',
            'phone_number' => '081234567890',
            'address' => 'Jl. Sehat No.1, Bandung',
            'role_id' => 1, // anggap 1 = admin
        ]);

        // Buat data admin, terhubung ke user di atas
        Admin::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'position' => 'Admin Gizi',
            'gender' => $user->gender,
            'birth_date' => $user->birth_date,
            'phone_number' => $user->phone_number,
            'address' => $user->address,
        ]);
    }
}
