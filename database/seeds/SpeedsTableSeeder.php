<?php

use Illuminate\Database\Seeder;
use App\Speed;

class SpeedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speed::truncate();
        Speed::insert([
            'speed'       => 40,
            'retraction'  => 80,
            'filament_id' => 1,
            'user_id'     => 1,
            'printer_id'  => 1
        ]);
        Speed::insert([
            'speed'       => 50,
            'retraction'  => 100,
            'filament_id' => 2,
            'user_id'     => 2,
            'printer_id'  => 1
        ]);
    }
}