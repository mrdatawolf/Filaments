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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Type::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
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
