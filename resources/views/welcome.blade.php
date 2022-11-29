@extends('app')
@section('content')
<div class="row">
    <div class="col-2">
        <div class="row">
            <form action="/" method="POST" class="m-3">
                @csrf
                <div class="col-12">
                    <h3>Жанры</h3>
                    <div class="mb-3">
                        @foreach ($genres as $genre)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="{{ $genre->id }}" id="genre{{ $genre->id }}" name="genre[]">
                            <label class="form-check-label" for="genre{{ $genre->id }}">{{ $genre->title }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12">
                    <h3>Актёры</h3>
                    @foreach ($actors as $actor)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="{{ $actor->id }}" id="actor{{ $actor->id }}" name="actors[]">
                        <label class="form-check-label" for="actor{{ $actor->id }}">{{ $actor->name }}</label>
                    </div>
                    @endforeach
                </div>

                <div class="col-12">
                    <h3>Режиссёры</h3>
                    @foreach ($directors as $director)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="{{ $director->id }}" id="director{{ $director->id }}" name="directors[]">
                        <label class="form-check-label" for="director{{ $director->id }}">{{ $director->name }}</label>
                    </div>
                    @endforeach
                </div>

                <div class="col-12">
                    <h3>Дата выпуска</h3>
                    <div class="mb-3">
                        <label for="dateForm" class="form-label">c</label>
                        <input type="date" id="dateFrom" name="dateFrom" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="dateTo" class="form-label">по</label>
                        <input type="date" id="dateTo" name="dateTo" class="form-control">
                    </div>

                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="dateForm" class="form-label">Упорядочить</label>
                        <select id="dateFrom" name="order" class="form-select">
                            <option value="0">Не упорядочивать</option>
                            <option value="1">Сначала старые</option>
                            <option value="2">Сначала новые</option>
                            <option value="3">Сначала с высоким рейтингом</option>
                            <option value="4">Сначала с низким рейтнгом</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3" col-12>
                    <button class="btn btn-primary">Показать</button>
                </div>
            </form>
        </div>
    </div>

<div class="col-10">
    <div class="row mt-3">
        @foreach ($films as $film)
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
                @if (Auth::check() and Auth::user()->isAdmin())
                <a href="/films/{{ $film->id }}" class="btn btn-success">Изменить</a>
                @endif
                @if (Auth::check() and !Auth::user()->isAdmin())
                <form action="/favorites" method="POST">
                    @csrf
                    <input type="hidden" value={{ $film->id }} name="film">
                    <button class="btn btn-success">В избранное</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
<div class="d-flex justify-content-center">
    {{ $films->links() }}    
</div>
</div>
@endsection