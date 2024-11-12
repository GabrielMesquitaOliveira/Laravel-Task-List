<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task as ModelsTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => ModelsTask::latest()->paginate(5),
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{task}/edit', function (ModelsTask $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (ModelsTask $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {

    $task = ModelsTask::create($request->validated());

    return redirect()->route('tasks.show', $task->id)->with('success', 'Task created succesfully');
})->name('tasks.store');

Route::put('/tasks/{task}', function (ModelsTask $task, TaskRequest $request) {

    $task->update($request->validated());

    return redirect()->route('tasks.show', $task->id)->with('success', 'Task updated succesfully');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (ModelsTask $task) {
    $task->delete();
    return redirect()->route('tasks.index')->with(
        'success',
        'Task deleted succesfully'
    );
})->name('tasks.destroy');
