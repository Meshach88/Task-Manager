<?php

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
    return view('index');
});

Route::post('/tasks/create', function () {
    return view('create-task');
})->name('tasks.create');

Route::post('/tasks/store', function() {
    return view('tasks');
})->name('tasks.store');

Route::get('/tasks/{task}', function(Task $task){
    return view('task');
})->name('task.show');

Route::put('/tasks/{task}', function(Task $task){
    return view('edit-task');
})->name('task.edit');