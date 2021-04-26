<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => '2021-04-23 05:50:48',
                'verification_token' => '',
                'contact'            => '',
                'alternate_contact'  => '',
                'age'                => '',
                'profession'         => '',
                'present_address'    => '',
                'permanent_address'  => '',
                'nid'                => '',
                'two_factor_code'    => '',
            ],
        ];

        User::insert($users);
    }
}
