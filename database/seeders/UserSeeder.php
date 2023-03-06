<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                'dni' => '123456789',
                'name' => 'admin',
                'sex' => 'male',
                'age' => '20',
                'address' => 'admin',
                'role' => '1',
                'birth_date' => date('2001-01-01'),
                'skill' => 'open',
                'federate_number' => '1',
                'insurance' => '',
                'email' => 'admin@gmail.com',
                'password' => md5('admin'),
                'remember_token' => '',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                'email_verified_at' => '',
                ],
                [
                'dni' => '48133467',
                'name' => 'gerard',
                'sex' => 'male',
                'age' => '20',
                'address' => 'Nelson Mandela',
                'role' => '0',
                'birth_date' => date('2002-03-20'),
                'skill' => 'open',
                'federate_number' => '2',
                'insurance' => '',
                'email' => 'gerard@gmail.com',
                'password' => md5('gerard'),
                'remember_token' => '',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                'email_verified_at' => '',
                ],
                [
                'dni' => '1425367',
                'name' => 'vlad',
                'sex' => 'male',
                'age' => '19',
                'address' => 'Moises Segundo',
                'role' => '0',
                'birth_date' => date('2003-10-13'),
                'skill' => 'open',
                'federate_number' => '3',
                'insurance' => '',
                'email' => 'vlad@gmail.com',
                'password' => md5('vlad'),
                'remember_token' => '',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                'email_verified_at' => '',
                ]
            ]);
    }
}
