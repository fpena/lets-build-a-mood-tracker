<?php

namespace Tests\Feature;

use App\Goal;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GoalsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_guest_cannot_see_goal_creation()
    {
        $this->getJson(route('goals.create'))
            ->assertStatus(401);
    }

    /** @test */
    public function a_user_can_see_goal_creation()
    {
        $user = create(User::class);
        $this->actingAs($user);

        $this->get(route('goals.create'))
            ->assertStatus(200);
    }

    /** @test */
    public function a_user_cannot_create_goal_without_required_params()
    {
        $user = create(User::class);
        $this->actingAs($user);

        $this->postJson(route('goals.store'))
            ->assertStatus(422);
    }

    /** @test */
    public function a_user_can_create_goals()
    {
        $user = create(User::class);
        $this->actingAs($user);

        $this->postJson(route('goals.store', [
            'name' => 'Watch less Netflix'
        ]))
            ->assertStatus(302);

        $goal = Goal::first();
        $this->assertNotNull($goal);
        $this->assertEquals($goal->user->id, $user->id);
    }

}
