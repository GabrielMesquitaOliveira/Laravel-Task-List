<h1>
    The list of tasks
</h1>

<div>
    @forelse ($tasks as $task)
        <div>
            <a href="{{route('tasks.show', ['task' => $task->id])}}">{{$task->title}}</a>
        </div>
    @empty
        <div>there are no tasks</div>
    @endforelse
</div>
