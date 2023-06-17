<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = new UserModel();
        $users->insert([
            'username' => 'ferika',
            'email' => 'ferikaputra07@gmail.com',
            'password_hash' => Password::hash('ferika'),
            'active' => 1
        ]);
    }
}
