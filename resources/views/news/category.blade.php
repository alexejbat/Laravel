@extends('layouts.main')

@section('title')
    @parent Категории
@endsection

@section ('menu')
    @include('menu')
@endsection

@section('content')
    <h1>Новости категории  {{ $category }}</h1>
    @forelse($news as $item)
        <h2>{{ $item['title'] }}</h2>
        @if (!$item['isPrivate'])
            <a href="{{ route('news.show', $item['id']) }}">Подробнее..</a>
        @endif
    @empty
        Нет новостей
    @endforelse

@endsection
