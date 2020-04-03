<?php

namespace App\Http\Controllers;

use App\Goal;
use App\MoodUpdate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $moodUpdate = MoodUpdate::today()->first();
        $goals = Goal::where('user_id', auth()->id())->get();

        return view('home', compact('moodUpdate', 'goals'));
    }
}
