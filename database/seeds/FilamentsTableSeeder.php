<?php

use Illuminate\Database\Seeder;
use App\Filament;

class FilamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Filament::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Filament::insert([
            'name'     => 'Yellow',
            'width'    => 1.75,
            'revision' => '1',
            'brand_id' => 1,
            'type_id'  => 1
        ]);
        Filament::insert([
            'name'     => 'White',
            'width'    => 1.75,
            'revision' => '5',
            'brand_id' => 3,
            'type_id'  => 2
        ]);
    }
}
