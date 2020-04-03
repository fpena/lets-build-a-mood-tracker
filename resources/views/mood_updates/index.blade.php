@extends('layouts.app')

@section('content')
    <div class="w-3/4 md:w-1/2 mx-auto">
        <h3 class="text-xl">Your past entries</h3>

        <ul class="mt-4">
            @foreach($moodUpdates as $moodUpdate)
                <li class="p-2 {{ $loop->index % 2 == 0 ? 'bg-blue-100' : 'bg-blue-200' }}">
                    <p>{{ $moodUpdate->created_at->format('Y-m-d') }}: {!! $moodUpdate->moodDescription !!}</p>
                    @if($moodUpdate->goals->count() > 0)
                    <p>This day I did the follow:
                        @foreach($moodUpdate->goals as $goal)
                            {{ $goal->name }}
                        @endforeach
                    </p>
                    @endif
                </li>
            @endforeach
        </ul>

        <div class="mt-10">
            <a class="text-gray-500 underline" href="{{ route('home') }}">Back to dashboard</a>
        </div>

    </div>
@endsection
