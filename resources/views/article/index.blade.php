@extends('layouts.app')

@section('content')
    @foreach (['success', 'error', 'warning', 'info'] as $msg)
        @if(session()->has($msg))
            <div class="alert alert-{{ $msg }}">
                {{ session($msg) }}
            </div>
        @endif
    @endforeach
    <form method="GET" action="{{ route('articles.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Поиск по названию..." value="{{ $q ?? '' }}">
            <button type="submit" class="btn btn-primary">Найти</button>
        </div>
    </form>
    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <h2>{{$article->name}}</h2>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <a href="{{ route('articles.show', $article->id) }}">{{Str::limit($article->body, 200)}}</a>
         <a href="{{ route('articles.edit', $article->id) }}">Редактировать</a>
         <form method="POST" action="{{ route('articles.destroy', $article->id) }}" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="btn btn-sm btn-danger"
                    onclick="return confirm('Вы уверены, что хотите удалить эту статью?')">
                Удалить
            </button>
        </form>
    @endforeach
@endsection
