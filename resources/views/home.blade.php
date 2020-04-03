@extends('layouts.app')

@section('content')
<div class="w-1/2 mx-auto">
    <h3 class="text-xl">Welcome to Laramood!</h3>

    <h4 class="text-base mt-5">How's your day been?</h4>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-5" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('mood.store') }}">
        @csrf
        <div class="relative">
            <select name="mood" id="" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                <option value="1">&#128545; Terrible</option>
                <option value="2">&#128533; Bad</option>
                <option value="3">&#128528; OK</option>
                <option value="4" selected>&#128512; Good</option>
                <option value="5">&#128513; Great</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>

        <div class="mt-4">
            <textarea name="journal" class="shadow appearance-none border border-gray-200 px-4 py-3 rounded w-full" id="" placeholder="Write something inspiring..."></textarea>
        </div>

        <div class="mt-4">
            <input name="tags" placeholder="Write some tags..." type="text" class="input-text" />
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Submit entry
            </button>
        </div>
    </form>
</div>
@endsection
