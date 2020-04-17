<?php

namespace Tests\Unit;

use App\Goal;
use App\MoodUpdate;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GoalTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @var \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed
     */
    protected $goal;

    protected function setUp(): void
    {
        parent::setUp();
        $this->goal = create(Goal::class);
    }

    /** @test */
    public function a_mood_has_goals()
    {
        $this->assertInstanceOf(User::class, $this->goal->user);
    }

}
