<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => Hash::make('password'),
            'remember_token' => null,
            'created_at'     => '2019-04-16 08:40:35',
            'updated_at'     => '2019-04-16 08:40:35',
            'deleted_at'     => null,
        ]];

        User::insert($users);
        User::factory()->count(100)->create();
    }
}
