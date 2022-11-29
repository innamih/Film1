@extends('app')
@section('content')
<div class="row p-3">
    <div class="card col-4">
        <img src="{{ $film->poster }}" class="card-img-top" alt="{{ $film->title }}">
    </div>
    <div class="card col-4">
        <div class="card-body">
            <h5 class="card-title">{{ $film->title }}</h5>
            @foreach ($film->genres as $genre)
            <span class="badge text-bg-primary">{{ $genre->title }}</span>
            @endforeach
            <p class="card-text">Дата выхода: {{ $film->date }}</p>
            <p class="card-text">Режиссёр: {{ $film->director->name }}</p>
            <!--a href="/films/{{ $film->id }}" class="btn btn-success">Изменить</a-->
        </div>
    </div>
    <div class="card col-4">
        <div class="card-body">
            <p>Актёры:</p>
            <ul>
                @foreach ($film->actors as $actor)
                <li class="row">
                    <p class="col">{{ $actor->name }}</p>
                    @if (Auth::check() and Auth::user()->isAdmin())
                    <div class="col">
                        <form action="/films/{{ $film->id }}/actors/{{ $actor->id }}" method="POST">
                            @csrf
                            @method("delete")
                            <button class="bnt bnt-danger">Удалить</button>
                        </form>
                    </div>
                    @endif

                </li>
                @endforeach
            </ul>
            <!--a href="/films/{{ $film->id }}" class="btn btn-success">Изменить</a-->
        </div>
    </div>

    <div class="row">
        @foreach ($film->posters as $poster)
        <div class="card mb-3 col-4">
            <img src="{{ $poster->url }}" alt="poster">
            @if (Auth::check() and Auth::user()->isAdmin())
            <div class="card-body">
                <form action="/films/{{ $film->id }}/posters/{{ $poster->id }}" method="POST">"
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Удалить</button>
                </form>
            </div>
            @endif
        </div>
        @endforeach
    </div>

    @if (!Auth::check() or Auth::check() and !Auth::user()->isAdmin())
    <div class="row">
        @foreach ($film->ratings as $rating)
        <div class="card col-3">
            <h2>{{ $rating->user->name }}</h2>
            <h3>{{ $rating->rating }}</h3>
            <div class="card-body">
                <p>{{ $rating->review }}</p>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    @if (Auth::check())
    @if (Auth::user()->isAdmin())
    <div class="row">
        <div class="col">
            <form action="/films/{{ $film->id }}" method="POST" class="m-3">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="actor">Актёр</label>
                    <select name="actor" id="actor" class="form-select">
                        @foreach ($actors as $actor)
                        <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
        <div class="col">
            <form action="/films/{{ $film->id }}" method="POST" enctype="multipart/form-data" class="m-3">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="poster">Скриншот</label>
                    <input type="file" class="form-control" name="poster">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
        <div class="col">
            <form action="/films/{{ $film->id }}" method="POST" class="m-3">
                @csrf
                @method('put')
                <div class="mb-3">
                    @foreach ($genres as $genre)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="{{ $genre->id }}" id="genre{{ $genre->id }}" name="title[]">
                        <label class="form-check-label" for="genre{{ $genre->id }}">{{ $genre->title }}</label>
                    </div>
                    @endforeach
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
    </div>
    <h2>Отзывы</h2>
    @foreach ($film->ratingsforchek as $rating)
    <div class="row">
        <div class="col">{{ $rating->user->name }}</div>
        <div class="col">{{ $rating->rating }}</div>
        <div class="col">{{ $rating->review }}</div>
        <div class="col">
            <form action="/films/{{ $film->id }}/ratings/{{ $rating->id }}" method="POST">
                @csrf
                @method('put')
                <button class="btn btn-success">Одобрить</button>
            </form>
        </div>
        <div class="col">
            <form action="/films/{{ $film->id }}/ratings/{{ $rating->id }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Удалить</button>
            </form>
        </div>
    </div>
    @endforeach
    @else
    <h2>Отзывы</h2>
    <div class="row">
        <div class="col">
            <form action="/films/{{ $film->id }}/ratings" method="POST" class="m-3">
                @csrf
                <div class="mb-3">
                    <label for="rating" class="form-label">Оценка</label>
                    <select class="form-select" name="rating" id="rating">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="review" class="form-label">Отзыв</label>
                    <textarea name="review" id="review" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
    </div>
    @endif
    @endif
    @endsection