<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Role;
use App\Models\User;





class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        RoleSeeder::class,
        AdminSeeder :: class,
        // PasienSeeder::class,
          // DiagnosesSeeder::class,
        // DiagnosisGejalaSeeder::class,

        ]);

    }
}
