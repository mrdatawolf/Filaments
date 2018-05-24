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
        Schema::disableForeignKeyConstraints();
        Brand::truncate();
        Schema::enableForeignKeyConstraints();
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
