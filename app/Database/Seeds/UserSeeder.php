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
            'username' => 'tesprogrammer130623C16',
            'email' => 'ferikaputra07@gmail.com',
            'password_hash' => Password::hash('bisacoding-13-06-23'),
            'active' => 1
        ]);
    }
}
