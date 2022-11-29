<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фильмы</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Фильмы</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @if (Auth::check())
                        @if (Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">Админка</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/lk">Личный кабинет</a>
                        </li>
                        @endif
                        @endif
                        @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Выйти</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Войти</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register">Регистрация</a>
                        </li>

                        @endif
                    </ul>
                    <form class="d-flex" role="search" action="/films/search" method="POST">
                        @csrf
                        <input name="str" class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Найти</button>
                    </form>

                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>