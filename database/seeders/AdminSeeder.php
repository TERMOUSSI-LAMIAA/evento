<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Lamiaa',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $admin->assignRole($adminRole);
    }
}
