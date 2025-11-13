@extends('layouts.app')

@section('title', isset($task) ? 'Редактировать задачу' : "Создать задачу")

@section('content')
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task) @method("PUT") @endisset
        <div class="mb-4">
            <label for='title'>Заголовок</label>
            <input type="text" name='title' id='title' value="{{ $task->title ?? old('title')}}"/>
            @error('title')
                <p class="errors">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for='description'>Описание</label>
            <textarea type="text" name='description' id='description' rows='5'>
                {{ $task->description ?? old('description')}}
            </textarea>
            @error('description')
                <p class="errors">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for='long_description'>Текст</label>
            <textarea type="text" name='long_description' id='long_description' rows='10'>
                {{ $task->long_description ?? old('long_description')}}
            </textarea>
            @error('long_description')
                <p class="errors">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex mt-4 gap-2 items-center">
            <button type="submit" class="btn">
                @isset($task) 
                    Редактировать задачу
                @else
                    Создать задачу
                @endisset
            </button>
            <a href="{{route('tasks.index')}}" class="link">Назад</a>
        </div>
    </form>
@endsection
