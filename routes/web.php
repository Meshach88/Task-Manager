<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(12)
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{task}', function (Task $task) {
    return view('task', ['task' => $task]);
})->name('tasks.show');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::post('/tasks/store', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required'
    ]);
    $task = Task::create(
        [
            'title' => $data['title'],
            'description' => $data['description'],
            'completed' => '0'
        ]
    );
    return redirect(route('tasks.show', ['task' => $task]))->with('success', 'Task added successfully');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Request $request, Task $task) {
    $data = $request->validate([
        'title' => 'required',
        'description' => 'required'
    ]);

    $task->update([
        'title' => $data['title'],
        'description' => $data['description'],
        'completed' => '0'
    ]);

    return redirect(route('tasks.show', ['task' => $task]))->with('success', 'Task updated successfully');
})->name('tasks.update');


Route::delete('/tasks/{task}', function (Task $task) {
    return view('edit-task');
})->name('tasks.destroy');
