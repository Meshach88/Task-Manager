@extends('layouts/app')

@section('content')
<h1 class="text-4xl font-bold m-5 p-6 text-blue-900">Tasks</h1>
<div class="grid grid-cols-3 m-5 p-6 gap-4">
    @foreach($tasks as $task)
    <div class="bg-white p-6 rounded-xl shadow-md max-w-xl mx-auto my-4">
        <a href="{{ route('tasks.show', $task) }}">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2 hover:text-blue-500 hover:underline">{{$task->title}}</h2>
        </a>
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

    @endforeach

</div>
<div>{{ $tasks->links() }}</div>

@endsection