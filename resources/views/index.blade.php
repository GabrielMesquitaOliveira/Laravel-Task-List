@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    <div class="mb-8">
        <a class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded shadow" href="{{ route('tasks.create') }}">
            Add Task
        </a>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        @forelse ($tasks as $task)
            <div class="mb-4 flex justify-between items-center border-b border-gray-200 pb-2">
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                   class="text-lg font-medium text-gray-800 hover:text-blue-600 @if($task->completed) line-through text-red-600 @endif">
                    {{ $task->title }}
                </a>

                <form method="POST" action="{{ route('tasks.toggle-complete', $task) }}" class="ml-4">
                    @csrf
                    @method('PUT')
                    <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded text-xs @if($task->completed) bg-red-500 hover:bg-red-600 @endif">
                        Mark as {{ $task->completed ? 'Not Completed' : 'Completed' }}
                    </button>
                </form>
            </div>
        @empty
            <div class="text-center text-gray-500">
                There are no tasks
            </div>
        @endforelse
    </div>

    @if ($tasks->count())
        <nav class="mt-6 flex justify-center">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
