@extends('app')
@section('content')
<div class="row mt-3"></div>
@foreach ($films as $film)
<div class="card col-3">
    <a href="/films/{{ $film->id }}">
        <img src="{{ $film->poster }}" class="card-img-top" alt="{{ $film->title }}">
    </a>
    <div class="card-body">
        <h5 class="card-title">{{ $film->title}}</h5>
        <h6 class="card-text">Рейтинг: {{ $film->reting }}</h6>
        @foreach ($film->genres as $genre)
        <span class="badge text-bg-primary">{{ $genre->title }}</span>
        @endforeach
        <p class="card-text">Дата выхода:{{ $film->date }}</p>
        <p class="card-text">Режиссёр:{{ $film->director->name }}</p>
        @if (Auth::check() and Auth::user()->isAdmin())
        <a href="/films/{{ $film->id }}" class="btn btn-success">Изменить</a>
        @endif
    </div>
</div>
@endforeach
</div>
@endsection