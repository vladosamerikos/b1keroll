<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('races')->insert(
            [
                [
                'name' => 'Holy Run',
                'description' => 'Carrera de la HolyRun',
                'unevenness' => '3',
                'map_frame' => '',
                'number_of_competitors' => '51',
                'length' => '5',
                'start_date' => date('2023-05-03'),
                'start_time' => date('08:00'),
                'start_point' => 'Plaça de la Vila',
                'promotional_poster' => '',
                'price' => '23',
                'active' => '1',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                'name' => 'Cursa Bimbo',
                'description' => 'Carrera de la Bimbo',
                'unevenness' => '5',
                'map_frame' => '',
                'number_of_competitors' => '23',
                'length' => '5',
                'start_date' => date('2023-04-23'),
                'start_time' => date('09:00'),
                'start_point' => 'Plaça de les Olives',
                'promotional_poster' => '',
                'price' => '20',
                'active' => '1',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                'name' => 'Automobile Park Run',
                'description' => 'Carrera del Automobile Park Run',
                'unevenness' => '13',
                'map_frame' => '',
                'number_of_competitors' => '91',
                'length' => '5',
                'start_date' => date('2024-05-03'),
                'start_time' => date('07:00'),
                'start_point' => 'Plaça del Diamant',
                'promotional_poster' => '',
                'price' => '57',
                'active' => '1',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                ]
            ]);
    }
}
