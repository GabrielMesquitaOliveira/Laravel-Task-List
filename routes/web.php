<?php

use App\Models\Task as ModelsTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => ModelsTask::orderBy('id', 'desc')->get(),
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{id}/edit', function ($id) {
    return view('edit', [
        'task' => ModelsTask::findOrFail($id)
    ]);
})->name('tasks.edit');

Route::get('/tasks/{id}', function ($id) {
    return view('show', [
        'task' => ModelsTask::findOrFail($id)
    ]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);
    $task = new ModelsTask();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show', $task->id)->with('success', 'Task created succesfully');
})->name('tasks.store');

Route::put('/tasks/{id}', function ($id,Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);
    $task = ModelsTask::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show', $task->id)->with('success', 'Task updated succesfully');
})->name('tasks.update');
