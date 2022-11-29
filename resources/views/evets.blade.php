@extends('app')
@section('content')
<form action="{{ route('events') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Тема</label>
        <input type="text" class="form-control" id="exampleInputTitle" name='title'>

        <div class="mb-3">
            <label for="event" class="form-label">События1</label>
            <input type="text" name='body' class="form-control" id="exampleInputBody">
        </div>
    </div>
    <li class="nav-item">
        <a class="nav-link" href="/events">Новости кино</a>
        <a class="nav-link" href="/events">Фестивали. Мероприятия</a>
    </li>


    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @endsection