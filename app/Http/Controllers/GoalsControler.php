<?php

namespace App\Http\Controllers;

use App\Goal;
use Illuminate\Http\Request;

class GoalsControler extends Controller
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
        $goals = Goal::where('user_id', auth()->id())->get();

        return view('goals.index', compact('goals'));
    }

    public function create()
    {
        return view('goals.create');
    }

    public function store(Request $request)
    {
        $payload = $this->validate($request, [
           'name' => 'required',
           'description' => 'nullable',
        ]);

        Goal::create(array_merge($payload, [
            'user_id' => auth()->id()
        ]));

        return redirect(route('goals.index'))
            ->with('success', 'Your goal is ready!');
    }
}
