@extends('layouts.main')

@section('title', 'Новость')

@section('menu')
    @include('menu')
@endsection

@section('content')
    @if ($news)
        @if (!$news['isPrivate'])
            <h2>{{ $news['title'] }}</h2>
            <p>{{ $news['text'] }}</p>
        @else
            Зарегистрируйтесь для просмотра
        @endif
    @else
        Нет новости с таким id
    @endif
@endsection
