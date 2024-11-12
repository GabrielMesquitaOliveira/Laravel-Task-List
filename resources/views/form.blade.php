@extends('layouts.app')

@section('styles')
    <style>
        .error-message {
            color: #e53e3e; /* Tailwind's red-600 color */
            padding: 0.5rem;
            font-size: 0.875rem;
        }
    </style>
@endsection

@section('content')
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">{{ isset($task) ? 'Edit Task' : 'Add Task' }}</h1>
        <form method="POST" action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}">
            @csrf
            @isset($task)
                @method('PUT')
            @endisset

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}"
                       class="w-full border border-gray-300 rounded-lg p-2 @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" id="description" cols="30" rows="4"
                          class="w-full border border-gray-300 rounded-lg p-2 @error('description') border-red-500 @enderror">{{ $task->description ?? old('description') }}</textarea>
                @error('description')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="long_description" class="block text-gray-700 font-semibold mb-2">Long Description</label>
                <textarea name="long_description" id="long_description" cols="30" rows="6"
                          class="w-full border border-gray-300 rounded-lg p-2 @error('long_description') border-red-500 @enderror">{{ $task->long_description ?? old('long_description') }}</textarea>
                @error('long_description')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow">
                    {{ isset($task) ? 'Update Task' : 'Add Task' }}
                </button>
            </div>
        </form>
    </div>
@endsection
