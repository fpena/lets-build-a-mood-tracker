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

    public function store(Request $request)
    {
        $payload = $this->validate($request, [
            'mood' => 'required',
        ]);

        $moodUpdate = MoodUpdate::where('created_at', '>=', date('Y-m-d').' 00:00:00')
            ->first();

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
