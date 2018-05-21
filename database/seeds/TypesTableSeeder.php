<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::truncate();
        Type::insert([
            'name' => 'Polylactic acid',
            'slug' => 'PLA'
        ]);
        Type::insert([
            'name' => 'Acrylonitrile butadiene styrene',
            'slug' => 'ABS'
        ]);
    }
}
