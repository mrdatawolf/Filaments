<?php

use Illuminate\Database\Seeder;
use App\Printers;
use App\Types;
use App\Brands;
use App\Filaments;

class PrintersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Printers::truncate();
        Printers::insert([
            'name'    => 'Select Mini',
            'version' => '2',
            'brand_id' => 1
        ]);

        //do the pivots for a printer
        $type = Types::where('id',1)->first();
        $filament = Filaments::where('id',1)->first();

        $printer = Printers::where('id',1)->first();
        $printer->types()->attach($type);
        $printer->filaments()->attach($filament);
    }
}
