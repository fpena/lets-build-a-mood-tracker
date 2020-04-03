@extends('layouts.app')

@section('content')
    <div class="w-1/2 mx-auto">

        @include('components.success')

        <div class="flex flex-row items-center justify-between">
            <h3 class="text-xl">Your goals</h3>
            <a class="text-gray-500 underline" href="{{ route('goals.create') }}">Create goal</a>
        </div>


        <ul class="mt-4">
            @foreach($goals as $goal)
                <li class="p-2 {{ $loop->index % 2 == 0 ? 'bg-blue-100' : 'bg-blue-200' }}">
                    {{ $goal->name }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
