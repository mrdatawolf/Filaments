<?php

use Illuminate\Database\Seeder;
use App\Filaments;
use App\Brands;
use App\Types;
use App\Printers;
//use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Types::truncate();
        Brands::truncate();
        Filaments::truncate();
        Printers::truncate();
        //Users::truncate();

        Types::insert([
            'name' => 'Polylactic acid',
            'slug' => 'PLA'
        ]);
        Types::insert([
            'name' => 'Acrylonitrile butadiene styrene',
            'slug' => 'ABS'
        ]);
        Brands::insert([
            'name' => 'Hatchbox',
            'slug' => 'HATCH'
        ]);
        Filaments::insert([
            'name'     => 'Yellow',
            'width'    => 1.75,
            'revision' => '1'
        ]);
        Printers::insert([
            'name'    => 'Select Mini',
            'version' => '2'
        ]);
        //pivot the brand
        $filament = Filaments::where('id',1)->first();
        $type = Types::where('id',1)->first();
        $filament->types()->attach($type);

    }
}
