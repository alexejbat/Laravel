@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <h2>Новости</h2>
    @forelse($news as $item)
        <a href="{{ route('news.show', $item['id']) }}">{{ $item['title'] }}</a><br>
    @empty
        <p>Нет новостей</p>
    @endforelse

@endsection
