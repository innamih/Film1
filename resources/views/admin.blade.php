@extends('app')
@section('content')
<h1>Админка</h1>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Режиссёры</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="genre-tab" data-bs-toggle="tab" data-bs-target="#genre-tab-pane" type="button" role="tab" aria-controls="genre-tab-pane" aria-selected="false">Жанры</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Актёры</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Фильмы</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="events-tab" data-bs-toggle="tab" data-bs-target="#events-tab-pane" type="button" role="tab" aria-controls="events-tab-pane" aria-selected="false">Новости кино</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        @component('admin.directorform',['directors'=>$directors])

        @endcomponent
    </div>
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        @component('admin.actorform',['actors'=>$actors])
        @endcomponent
    </div>
    <div class="tab-pane fade" id="genre-tab-pane" role="tabpanel" aria-labelledby="genre-tab" tabindex="0">
        @component('admin.genre',['genres'=> $genres])
        @endcomponent
    </div>

    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
        @component('admin.films',['directors'=>$directors, 'films'=>$films])
        @endcomponent
    </div>

    <div class="tab-pane fade" id="event-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
        @component('admin.event',['events'=>$events])
        @endcomponent
    </div>
    <!--div class="tab-pane fade" id="events-tab-pane" role="tabpanel" aria-labelledby="events-tab" tabindex="0">
         <figure class="figure">
  
            <img src="" class="figure-img img-fluid rounded" alt="">
            <figcaption class="figure-caption text-end">Съемка фильма.</figcaption>
        </figure>

        <div class=”bx-newsdetail-content”>
            <p>
                Новости
                14 сентября в Петербурге откроется кинофестиваль «Мир знаний»
                С 14 по 18 сентября в Санкт-Петербурге пройдет XVII Международный кинофестиваль научно-популярных и исследовательских фильмов «Мир знаний». В его программу войдут 17 фильмов из восьми стран, в том числе восемь российских премьер. Темой фестиваля этого года станет «Вне времени и пространства».
            </p>
            <h3>О конкурсе</h3>
            <p>
                В международный конкурс этого года войдут восемь фильмов из Аргентины, Бразилии, Германии, Дании, Израиля, Италии, России и других стран. Представленные работы освещают две центральные темы: восприятие человеком искусственного интеллекта и взаимовлияние человечества, флоры и фауны.
            </p-->




    <div class=”row”>


        <div class=”col-md-6”>
            <form>

                <input type="text" class="form-control">
                <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                <button type="submit" class="btn btn-primary">Добавить</button>
                <button class="btn btn-danger">Удалить</button>
            </form>



            @endsection