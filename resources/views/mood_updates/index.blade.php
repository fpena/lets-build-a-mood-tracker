@extends('layouts.app')

@section('content')
    <div class="w-1/2 mx-auto">
        <h3 class="text-xl">Your past entries</h3>

        <ul class="mt-4">
            @foreach($moodUpdates as $moodUdpdate)
                <li class="p-2 {{ $loop->index % 2 == 0 ? 'bg-blue-100' : 'bg-blue-200' }}">{{ $moodUdpdate->created_at->format('Y-m-d') }}: {!! $moodUdpdate->moodDescription !!}</li>
            @endforeach
        </ul>

        <div class="mt-10">
            <a class="text-gray-500 underline" href="{{ route('home') }}">Back to dashboard</a>
        </div>

    </div>
@endsection
