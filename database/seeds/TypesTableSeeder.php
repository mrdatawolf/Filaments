<?php

use Illuminate\Database\Seeder;
use App\Types;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Types::truncate();
        Types::insert([
            'name' => 'Polylactic acid',
            'slug' => 'PLA'
        ]);
        Types::insert([
            'name' => 'Acrylonitrile butadiene styrene',
            'slug' => 'ABS'
        ]);
    }
}
