<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'username' => 'sudo',
                'password' => 'Synergics 2023',
                'role_id' => 1,
                'nama' => 'Synergics Team',
                'nrp' => null,
                'id_kesatuan' => null,
                'id_jabatan' => null,
                'id_pangkat' => null,
                'foto' => null,
            ]
        ];

        foreach($data as $item) {
            $user = User::create([
                'username' => $item['username'],
                'password' => bcrypt($item['password']),
                'role_id' => $item['role_id'],
            ]);

            $user->profil()->create([
                'nama' => $item['nama'],
                'nrp' => $item['nrp'],
                'id_kesatuan' => $item['id_kesatuan'],
                'id_jabatan' => $item['id_jabatan'],
                'id_pangkat' => $item['id_pangkat'],
                'foto' => $item['foto'],
            ]);
        }
    }
}
