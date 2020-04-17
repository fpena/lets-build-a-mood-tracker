<?php

namespace Tests\Feature;

use App\Goal;
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
        $moodUpdate = create(MoodUpdate::class, [
            'created_at' => Carbon::now()
        ]);

        $user = create(User::class);
        $this->actingAs($user);

        $this->get(route('home'))
            ->assertStatus(200)
            ->assertSee(`Your mood for today: {$moodUpdate->moodDescription}`);
    }

    /** @test */
    public function a_user_cannot_submit_form_with_non_required_params()
    {
        $user = create(User::class);
        $this->actingAs($user);

        $this->postJson(route('mood.store'))
            ->assertStatus(422);

        $this->assertCount(0, MoodUpdate::all());
    }

    /** @test */
    public function a_user_can_submit_form()
    {
        $user = create(User::class);
        $this->actingAs($user);

        $this->postJson(route('mood.store', [
            'mood' => 1,
            'journal' => 'Great day!'
        ]))->assertStatus(302);

        $moodUpdate = MoodUpdate::first();
        $this->assertNotNull($moodUpdate);
        $this->assertEquals('Great day!', $moodUpdate->journal);
    }

    /** @test */
    public function a_user_can_submit_form_with_goals()
    {

        $user = create(User::class);
        $this->actingAs($user);

        $goal = create(Goal::class, [
            'user_id' => $user->id
        ]);

        $this->postJson(route('mood.store', [
            'mood' => 1,
            'journal' => 'Good day!',
            'goals[' . $goal->id . ']' => 'on'
        ]))->assertStatus(302);

        $moodUpdate = MoodUpdate::first();
        $this->assertNotNull($moodUpdate);
        $this->assertEquals('Good day!', $moodUpdate->journal);
        $this->assertCount(1, $moodUpdate->goals);
    }
}
