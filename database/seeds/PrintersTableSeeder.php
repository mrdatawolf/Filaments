<?php

use Illuminate\Database\Seeder;
use App\Printer;
use App\Type;
use App\Brand;
use App\Filament;
use App\User;

class PrintersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Printer::truncate();
        Printer::insert([
            'name'    => 'Select Mini',
            'version' => '2',
            'brand_id' => 1
        ]);

        //do the pivots for a printer
        $type = Type::find(1);
        $filament = Filament::find(1);
        $user = User::find(1);

        $printer = Printer::find(1);
        $printer->users()->attach($user);
        $printer = Printer::find(1);
        $printer->types()->attach($type);
        $printer = Printer::find(1);
        $printer->filaments()->attach($filament);
        
    }
}
