<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $roles = [
        //     ['name' => 'Admin', 'enabled' => true],
        //     ['name' => 'User', 'enabled' => true],
        // ];

        // foreach ($roles as $role) {
        //     Role::create($role);
        // }

        Role::create([
            'name' => 'Admin',
            'description' => 'Administrator role',
            'enabled' => true
        ]);
        
        Role::create([
            'name' => 'User',
            'description' => 'Regular user role',
            'enabled' => true
        ]);
        
    }
}
