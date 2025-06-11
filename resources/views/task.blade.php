@extends('layouts/app')

@section('content')
<div class="mt-20 mx-auto p-5">
    <h2 class="text-2xl font-semibold text-gray-800 mb-2">{{$task->title}}</h2>
    <p class="text-gray-700 mb-4">{{$task->description}}</p>

    <p class="mb-2">
        <span class="inline-block px-3 py-1 text-sm rounded-full 
        {{ $task->completed ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
            {{ $task->completed ? 'Completed' : 'To Do' }}
        </span>
    </p>

    <p class="text-sm text-gray-500">
        Created {{ $task->created_at->diffForHumans() }} &middot;
        Updated {{ $task->updated_at->diffForHumans() }}
    </p>
</div>


@endsection