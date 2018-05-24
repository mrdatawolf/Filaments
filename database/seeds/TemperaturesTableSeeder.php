<?php

use Illuminate\Database\Seeder;
use App\Temperature;

class TemperaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Temperature::truncate();
        
        Temperature::insert([
            'celsius'     => 200,
            'filament_id' => 1,
            'user_id'     => 1,
            'printer_id'  => 1
        ]);
        Temperature::insert([
            'celsius'     => 220,
            'filament_id' => 2,
            'user_id'     => 2,
            'printer_id'  => 1
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
