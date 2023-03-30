<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sponsors')->insert(
            [
                [
                'cif' => '741852963',
                'name' => 'Mini España',
                'logo' => '',
                'address' => 'Calle de los Coches Pequeños',
                'main_plain' => '1',
                'active' => '1',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                'cif' => '7471852963',
                'name' => 'Renault ES',
                'logo' => '',
                'address' => 'Calle de los Coches Franceses',
                'main_plain' => '0',
                'active' => '1',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                ],
                [
                'cif' => '7417362963',
                'name' => 'Bimbo Ibérica',
                'logo' => '',
                'address' => 'Calle del buen pan',
                'main_plain' => '1',
                'active' => '1',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
                ]
            ]);
    }
}
?>