<?php

use App\Models\Task as ModelsTask;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => ModelsTask::orderBy('id', 'desc')->get(),
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {

    return view('show', ['task' => ModelsTask::findOrFail($id)]);
})->name('tasks.show');
