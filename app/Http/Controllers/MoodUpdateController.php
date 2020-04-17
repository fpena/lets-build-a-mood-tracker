<?php

namespace App\Http\Controllers;

use App\MoodUpdate;
use Illuminate\Http\Request;

class MoodUpdateController extends Controller
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

    public function index()
    {
        $moodUpdates = MoodUpdate::where('user_id', auth()->id())
            ->with('goals')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('mood_updates.index', compact('moodUpdates'));
    }

    public function store(Request $request)
    {
        $payload = $this->validate($request, [
            'mood' => 'required',
            'journal' => 'nullable',
            'tags' => 'nullable',
            'goals' => 'array|min:0'
        ]);

        $moodUpdate = MoodUpdate::today()->first();

        if ($moodUpdate) {
            return redirect(route('home'));
        }

        $moodUpdate = MoodUpdate::create(array_merge($payload, [
            'user_id' => auth()->id()
        ]));

        if ($request->get('goals')) {
            $goalKeys = array_keys($request->get('goals'));

            $moodUpdate->goals()->attach($goalKeys);
        }

        return redirect(route('home'))
            ->with('success', 'Your mood update is ready!');
    }
}
