<?php

use Illuminate\Database\Seeder;

class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::first();

        create(\App\Goal::class, [
            'name' => 'Meditation',
            'user_id' => $user->id
        ]);
    }
}
