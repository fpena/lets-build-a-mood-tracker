<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoodUpdateGoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mood_update_goal', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('goal_id')->index();
            $table->foreign('goal_id')->references('id')->on('goals')->onDelete('cascade');

            $table->unsignedInteger('mood_update_id')->index();
            $table->foreign('mood_update_id')->references('id')->on('mood_updates')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mood_update_goal');
    }
}
