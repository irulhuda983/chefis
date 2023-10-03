<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'nama' => 'super_admin'],
            ['id' => 2, 'nama' => 'admin'],
            ['id' => 4, 'nama' => 'petugas'],
        ];

        Role::truncate();

        foreach($data as $item)
        {
            Role::create([
                'id' => $item['id'],
                'role_name' => $item['nama'],
            ]);
        }
    }
}
