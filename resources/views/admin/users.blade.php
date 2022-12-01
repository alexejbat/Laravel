@extends('layouts.app')

@section('title', 'Юзеры')

@section ('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Пользователи</h2>
                @forelse($users as $user)
                    <div class="card-body">

                        @if ($user->is_admin)
                            <a href="{{ route('admin.toggleAdmin', $user) }}" type="button" class="btn btn-danger">Снять админа</a>
                        @else
                            <a href="{{ route('admin.toggleAdmin', $user) }}" type="button" class="btn btn-success">Назначить админом</a>
                        @endif
                            {{ $user->name }}
                    </div>
                @empty
                    <p>нет пользователей</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
