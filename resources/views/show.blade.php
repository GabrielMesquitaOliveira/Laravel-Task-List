@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $task->title }}</h2>

        <p class="text-gray-600 mb-2">{{ $task->description }}</p>

        @if ($task->long_description)
            <p class="text-gray-600 mb-4">{{ $task->long_description }}</p>
        @endif

        <p class="text-sm text-gray-500">Created: {{ $task->created_at->format('d M Y H:i') }}</p>
        <p class="text-sm text-gray-500 mb-4">Last Updated: {{ $task->updated_at->format('d M Y H:i') }}</p>

        <p class="text-lg font-medium {{ $task->completed ? 'text-green-600' : 'text-red-600' }}">
            Status: {{ $task->completed ? 'Completed' : 'Not completed' }}
        </p>

        <div class="flex space-x-4 mt-6">
            <a href="{{ route('tasks.edit', $task) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow">
                Edit
            </a>

            <form method="POST" action="{{ route('tasks.toggle-complete', $task) }}">
                @csrf
                @method('PUT')
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded shadow">
                    Mark as {{ $task->completed ? 'Not Completed' : 'Completed' }}
                </button>
            </form>

            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded shadow">
                    DELETE
                </button>
            </form>
        </div>
    </div>
@endsection
