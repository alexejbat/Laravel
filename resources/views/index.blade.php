@extends('layouts.main')

@section('title')
@parent | Главная
@endsection


@section('menu')
    @include('menu')
@endsection

@section('content')
    <div>
        Добро пожаловать в агрегатор новостей!
    </div>

@endsection
