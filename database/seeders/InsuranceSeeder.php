<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insurances')->insert(
            [
                [
                'cif' => '08915',
                'name' => 'Liberty Seguros',
                'address' => 'Seguros de la Libertad',
                'price_per_race' => '24',
                'active' => '1',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                'cif' => '08917',
                'name' => 'Repsol Seguros',
                'address' => 'Seguros de Repsol',
                'price_per_race' => '20',
                'active' => '1',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                'cif' => '08918',
                'name' => 'Mapfre Seguros',
                'address' => 'Seguros de Mapfre',
                'price_per_race' => '28',
                'active' => '1',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                ]
            ]);
    }
}
