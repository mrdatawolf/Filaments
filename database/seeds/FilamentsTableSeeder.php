<?php

use Illuminate\Database\Seeder;
use App\Filaments;

class FilamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Filaments::truncate();
        Filaments::insert([
            'name'     => 'Yellow',
            'width'    => 1.75,
            'revision' => '1',
            'brand_id' => 1,
            'type_id'  => 1
        ]);
    }
}
