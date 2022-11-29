@extends('app')
@section('content')
<h1>Привет, {{ Auth::user()->name }}</h1>
<div class="row mt-3">
    @foreach (Auth::user()->films as $film)
    <div class="card col-3">
        <a href="/films/{{ $film->id }}">
            <img src="{{ $film->poster }}" class="card-img-top" alt="{{ $film->title }}">
        </a>
        <div class="card-body">
            <h5 class="card-title">{{ $film->title}}</h5>
            <h6 class="card-text">Рейтинг: {{ $film->rating }}</h6>
            @foreach ($film->genres as $genre)
            <span class="badge text-bg-primary">{{ $genre->title }}</span>
            @endforeach
            <p class="card-text">Дата выхода:{{ $film->date }}</p>
            <p class="card-text">Режиссёр:{{ $film->director->name }}</p>
            <form action="/favorites {{ $film->id }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-success">Убрать</button>
            </form>
        </div>
    </div>
@endforeach
</div>
@endsection