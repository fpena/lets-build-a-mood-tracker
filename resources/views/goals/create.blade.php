@extends('layouts.app')

@section('content')
    <div class="w-1/2 mx-auto">

        <h3 class="text-xl">Create new goal</h3>

        @include('components.errors')

        <form method="POST" action="{{ route('goals.store') }}">
            @csrf
            <div class="mt-4">
                <input name="name" placeholder="Your goal" type="text" class="input-text" />
            </div>

            <div class="mt-4">
                <textarea name="description" class="shadow appearance-none border border-gray-200 px-4 py-3 rounded w-full" id="" placeholder="Write what your goal is all about..."></textarea>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn-primary">
                    Create goal
                </button>
            </div>
        </form>
    </div>
@endsection
