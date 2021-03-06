<?php

use Illuminate\Database\Seeder;
use App\Printer;

class PrintersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Printer::truncate();
        Schema::enableForeignKeyConstraints();
        Printer::insert([
            'name'    => 'Select Mini',
            'version' => '2',
            'brand_id' => 2
        ]);
        //do the pivots for a printer

        $printer = Printer::find(1);
        $printer->users()->attach(1);
        $printer->types()->attach(1);
        $printer->filaments()->attach(1);
        
    }
}
