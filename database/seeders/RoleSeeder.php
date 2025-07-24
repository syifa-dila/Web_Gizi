<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the roles table with predefined roles
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'pasien'],
            // Add more roles as needed
        ]);
    }
}
