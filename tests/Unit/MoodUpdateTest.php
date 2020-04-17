<?php

namespace Tests\Unit;

use App\MoodUpdate;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MoodUpdateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @var \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed
     */
    protected $moodUpdate;

    protected function setUp(): void
    {
        parent::setUp();
        $this->moodUpdate = create(MoodUpdate::class);
    }

    /** @test */
    public function a_mood_update_has_a_mood_description()
    {
        $this->moodUpdate->mood = 3;
        $this->moodUpdate->save();

        $this->assertEquals($this->moodUpdate->moodDescription, "&#128528; OK");
    }

    /** @test */
    public function a_mood_has_a_today_scope()
    {
        $result = MoodUpdate::today()->first();
        $this->assertNull($result);

        $this->moodUpdate->created_at = Carbon::now();
        $this->moodUpdate->save();

        $result = MoodUpdate::today()->first();

        $this->assertNotNull($result);
    }

    /** @test */
    public function a_mood_has_goals()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->moodUpdate->goals);
    }

}
