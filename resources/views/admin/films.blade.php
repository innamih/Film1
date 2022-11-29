<form action="/films" method="POST" enctype="multipart/form-data" class="m-3">
    @csrf
    <div class="mb-3">
        <label for="title">Название фильма</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="date">Дата выпуска</label>
        <input type="date" id="date" class="form-control" name="date">
    </div>
    <div class="mb-3">
        <label for="poster">Постер</label>
        <input type="file" id="poster" name="poster" class="form-control">
    </div>
    <div class="mb-3">
        <label for="events">Новости кино</label>
        <input type="file" id="events" name="body" class="form-control">
    </div>
    <div class="mb-3">
        <label for="director">Режиссёр</label>
        <select class="form-select" id="director" name='director_id'>
            @foreach ( $directors as $director)
            <option value="{{ $director->id }}">{{ $director->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <button class="bth bth-primary">Сохранить</button>
    </div>
</form>
<div class="films row">
    @foreach ($films as $film)
    <div class="card col-3">
        <img src="{{ $film->poster }}" class="card-img-top" alt="{{ $film->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $film->title}}</h5>
            @foreach ($film->genres as $genre)
            <span class="badge text-bg-primary">{{ $genre->title }}</span>
            @endforeach
            <p class="card-text">Дата выхода:{{ $film->date }}</p>
            <p class="card-text">Режиссёр:{{ $film->director->name }}</p>
            <a href="/films/{{ $film->id }}" class="btn btn-success">Изменить</a>
            <form action="/films/{{ $film->id }}" method="POST">
                @csrf
                @method("delete")
                <button class="btn btn-danger">Удалить</button>
            </form>
        </div>
    </div>
    @endforeach
</div>