@extends('app')
@section('content')
<form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleInputName" class="form-label">Имя</label>
        <input type="text" class="form-control" id="exampleInputName" name='name'>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input type="password" name='password' class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputConfirmPassword" class="form-label">Повторите пароль</label>
        <input type="password" name='password_confirmation' class="form-control" id="exampleInputConfirmPassword">
    </div>
    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form>
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