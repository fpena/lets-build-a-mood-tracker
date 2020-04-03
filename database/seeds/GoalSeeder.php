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

        factory(\App\Goal::class)->create([
            'name' => 'Meditation',
            'user_id' => $user->id
        ]);
    }
}
