<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="container mt-20 shadow-md mx-auto">
    <nav class="font-semibold text-xl">
        <ul class="flex gap-10 items-center justify-center">
            <li class="underline hover:decoration-blue-600"><a href="/">Home</a></li>
            <li class="underline hover:decoration-blue-600"><a href="/tasks">Tasks</a></li>
            <li class="underline hover:decoration-blue-600"><a href="/tasks/create">Add Task</a></li>
        </ul>
    </nav>
    <h1 class="text-2xl font-bold m-5">
        @yield('title')
    </h1>

    <div class="w-1/2 ml-5">
        @if (session()->has('success'))
        <p class="bg-green-100 text-green-400 p-2 rounded-lg">{{session('success')}}</p>
        @endif
    </div>

    @yield('content')
    
</body>
</html>