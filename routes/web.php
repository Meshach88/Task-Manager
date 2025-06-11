<?php

use App\Models\Task;
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
        'tasks' => Task::oldest()->paginate(12)
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create-task')
    ->name('tasks.create');

Route::get('/tasks/{task}', function (Task $task) {
    return view('task', ['task' => $task]);
})->name('tasks.show');

Route::post('/tasks/store', function () {
    return view('tasks');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task) {
    return view('edit-task');
})->name('tasks.edit');

Route::delete('/tasks/{task}', function (Task $task) {
    return view('edit-task');
})->name('tasks.destroy');
