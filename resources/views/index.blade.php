<h1>
    The list of tasks
</h1>

<div>
    @forelse ($tasks as $task)
        <div>
            <a href="{{route('tasks.show', ['id' => $task->id])}}">{{$task->title}}</a>
        </div>
    @empty
        <div>there are no tasks</div>
    @endforelse
</div>
