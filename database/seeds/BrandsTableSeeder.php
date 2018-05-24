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
        if(env('DB_CONNECTION') === 'mysql')
        {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }
        Brand::truncate();
        if(env('DB_CONNECTION') === 'mysql')
        {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
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
