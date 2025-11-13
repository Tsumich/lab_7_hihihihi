@extends('layouts.app')

@section('title')
    <h1 class="text-lg mb-4">{{ $task->title}}</h1>
    <a href="{{route('tasks.index')}}" 
        class="link">
        К списку задач
    </a>
@endsection


@section('content')
    <div>
    </div>
    <div class="mb-4 text-slate-700">{{ $task->description}}</div>
    <div class="mb-4 text-slate-700">{{ $task->long_description}}</div>

    <div class="mb-4 text-sm text-slate-500">Создано: {{ $task->created_at}}</div>
    <div class="mb-4 text-sm text-slate-500">Обновлено: {{ $task->updated_at->diffForHumans()}}</div>

    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Завершено</span>
        @else
            <span class="font-medium text-red-500">Незавершено</span>
        @endif
    </p>

    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task])}}"
            class="btn mb-4">Редактировать</a>

        <form class="mb-4" method="POST" action=" {{ route('tasks.delete', ['task' => $task->id]) }}">
            @csrf
            @method("DELETE")
            <button class="btn">Удалить</button>
        </form>

        <form method="POST" action=" {{ route('tasks.toggle-complete', ['task' => $task]) }} ">
            @csrf
            @method("PUT")
            <button type="submit" class="btn">
                Отметить как {{$task->completed ? 'незавершенная' : "завершенная" }}
            </button>
        </form>
    </div>
@endsection
