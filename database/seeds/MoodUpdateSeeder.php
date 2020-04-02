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

        factory(\App\MoodUpdate::class, 5)->create([
            'user_id' => $user->id
        ]);
    }
}
