@extends('layouts/app')

@section('title', 'Edit Task')

@section('content')
<!-- {{ $errors }} -->
<form action="{{route('tasks.update', ['task'=>$task])}}" method="POST">
    @csrf
    @method('PUT')
    <div class="m-5">
        <label class="text-lg font-semibold" for="title"> Title</label>
        <input class="border border-gray-300 p-2 ml-2 text-gray-600" type="text" name="title" , id="title" value="{{$task->title}}">
        <div class="mt-2">
            @error('title')
            <p class="text-red-500 text-xs font-semibold">{{$message}}</p>
            @enderror
        </div>
    </div>

    <div class="m-5">
        <label class="text-lg font-semibold" for="description">Description</label> <br>
        <textarea name="description" id="description" rows="5" class="border border-gray-300 p-2 text-gray-600">{{$task->description}}</textarea>
        <div class="mt-2">
            @error('description')
            <p class="text-red-500 text-xs font-semibold">{{$message}}</p>
            @enderror
        </div>
    </div>

    <div class="text-center">
        <button class="bg-blue-600 rounded-lg p-2 text-white m-2" type="submit">Edit Task</button>
    </div>

</form>

@endsection