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
            ->orderBy('created_at', 'desc')
            ->get();

        return view('mood_updates.index', compact('moodUpdates'));
    }

    public function store(Request $request)
    {
        $payload = $this->validate($request, [
            'mood' => 'required',
            'journal' => 'string',
            'tags' => 'nullable',
        ]);

        $moodUpdate = MoodUpdate::today()->first();

        if ($moodUpdate) {
            return redirect(route('home'));
        }

        MoodUpdate::create(array_merge($payload, [
            'user_id' => auth()->id()
        ]));

        return redirect(route('home'))
            ->with('success', 'Your mood update is ready!');
    }
}
