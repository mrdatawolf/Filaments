<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        User::insert([
            'name'     => 'MrDataWolf',
            'email'    => 'patrickmoon@gmail.com',
            'password' => '$2y$10$ZfsYhUz35HQTI2rrp8wRxOFojVmiUnPy9uObqAf4lHOmuXaNSCIRS'
        ]);
        User::insert([
            'name'     => 'Ryun',
            'email'    => 'ryan@gmail.com',
            'password' => '$2y$10$ZfsYhUz35HQTI2rrp8wRxOFojVmiUnPy9uObqAf4lHOmuXaNSCIRS'
        ]);
        
        $user = User::find(1);
        $user->filaments()->attach(1);
    }
}
