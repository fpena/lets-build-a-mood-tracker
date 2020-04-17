<?php

use Illuminate\Database\Seeder;

class MoodUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::first();

        create(\App\MoodUpdate::class, [
            'user_id' => $user->id
        ]);
    }
}
