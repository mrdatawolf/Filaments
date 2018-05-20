<?php

use Illuminate\Database\Seeder;
use App\Brands;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brands::truncate();
        Brands::insert([
            'name' => 'Hatchbox',
            'slug' => 'HATCH'
        ]);
    }
}
