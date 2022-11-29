<h2></h2>
<form class="row g-3" m-3 action="/directors" method="POST">
    @csrf
    <label for="staticEmail2" class="form-label">ФИО</label>
    <input type="text" class="form-control" id="staticEmail2" name="name">
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>
<table class="table-primary">
    @foreach ($directors as $director)
    <tr class="table-primary">
        <td class="table-primary">{{ $director->name}}</td>
        <td>
            <form action="/directors/{{ $director->id }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Удалить</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif