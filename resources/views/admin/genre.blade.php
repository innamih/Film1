<h2></h2>
<form class="row g-3" m-3 action="/genres" method="POST">
            @csrf
            <label for="genre" class="form-label">Название жанра</label>
            <input type="text" class="form-control" id="genre" name="title">
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
        <table class="table-primary">
            @foreach ($genres as $genre)
            <tr class="table-primary">
                <td class="table-primary">{{ $genre->title }}</td>
                <td>
                    <form action="/genres/{{ $genre->id }}" method="POST">
                        @csrf
                        @method('delete')
                <button class="btn btn-danger">Удалить</button>
                </form>
                </td>
            </tr>
            @endforeach
        </table>