<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        create(\App\User::class, [
            'email' => 'felipe@penya.cl',
            'password' => bcrypt('123456'),
        ]);
    }
}
