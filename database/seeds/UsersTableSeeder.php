<?php

use Illuminate\Database\Seeder;
use App\Users;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::truncate();
        Users::insert([
        'name'     => 'Select Mini',
        'email'    => 'patrickmoon@gmail.com',
        'password' => '$2y$10$ZfsYhUz35HQTI2rrp8wRxOFojVmiUnPy9uObqAf4lHOmuXaNSCIRS'
        ]);
    }
}