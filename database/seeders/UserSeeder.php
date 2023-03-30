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
                'insurance' => 1,
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'remember_token' => '',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                'email_verified_at' => date('Y-m-d H:m:s'),
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
                'insurance' => 1,
                'email' => 'gerard@gmail.com',
                'password' => Hash::make('gerard'),
                'remember_token' => '',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                'email_verified_at' => date('Y-m-d H:m:s'),
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
                'insurance' => 1,
                'email' => 'vlad@gmail.com',
                'password' => Hash::make('vlad'),
                'remember_token' => '',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                'email_verified_at' => date('Y-m-d H:m:s'),
                ]
            ]);
    }
}

?>