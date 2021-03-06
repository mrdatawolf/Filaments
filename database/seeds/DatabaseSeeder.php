<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FilamentsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(PrintersTableSeeder::class);
        $this->call(TemperaturesTableSeeder::class);
        $this->call(SpeedsTableSeeder::class);
    }
}
