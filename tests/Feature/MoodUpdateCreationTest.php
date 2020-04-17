<?php

namespace Tests\Feature;

use App\MoodUpdate;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MoodUpdateCreationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_guest_cannot_see_the_dashboard()
    {
        $this->get('home')
            ->assertStatus(302);
    }

    /** @test */
    public function a_user_can_see_the_dashboard()
    {
        $user = create(User::class);
        $this->actingAs($user);

        $this->get(route('home'))
            ->assertStatus(200);
    }

    /** @test */
    public function a_user_cannot_see_creation_form_if_mood_update_exists()
    {
        create(MoodUpdate::class, [
            'created_at' => Carbon::now()
        ]);

        $user = create(User::class);
        $this->actingAs($user);

        $this->get(route('home'))
            ->assertStatus(200);
    }
}
