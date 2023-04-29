<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Administrator',
                'tempat_asal' => 'Bogor',
                'tanggal_lahir' => '060915',
                'email' => 'admin@gmail.com',
                'password' => password_hash('putra2006', PASSWORD_BCRYPT),
                'role' => 'admin'
            ],
            [
                'name' => 'Putra septiadi p',
                'tempat_asal' => 'Bogor',
                'tanggal_lahir' => '060915',
                'email' => 'putraseptiadi6@gmail.com',
                'password' => password_hash('pass1234', PASSWORD_BCRYPT),
                'role' => 'santri'
            ]
        ];
    
        $this->db->table('users')->insertBatch($data);
    }
    
}
