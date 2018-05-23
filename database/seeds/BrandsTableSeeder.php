<?php

use Illuminate\Database\Seeder;
use App\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::truncate();
        Brand::insert([
            'name' => 'Hatchbox',
            'slug' => 'HATCH'
        ]);
        Brand::insert([
            'name' => 'MonoPrice',
            'slug' => 'MP'
        ]);
        Brand::insert([
            'name' => 'Ziro',
            'slug' => 'ZIRO'
        ]);
    }
}
