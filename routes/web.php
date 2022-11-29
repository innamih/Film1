<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use App\Models\Film;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FilmController::class, 'index'])->name('home');
Route::post('/', [FilmController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/lk', [UserController::class, 'index'])->middleware('auth');
Route::get('/admin', [UserController::class, 'index'])->middleware('admin');

Route::post('/directors', [DirectorController::class, 'store']);
Route::delete('/directors/{director}', [DirectorController::class, 'destroy']);

Route::post('/actors', [ActorController::class, 'store']);
Route::delete('/actors/{actor}', [ActorController::class, 'destroy']);

Route::post('films', [FilmController::class, 'store'])->middleware('admin');

Route::post('/films', [FilmController::class, 'store'])->middleware('admin');
Route::get('/films/{film}', [FilmController::class, 'show']);
Route::put('/films/{film}', [FilmController::class, 'update'])->middleware('admin');
Route::delete('/films/{film}', [FilmController::class, 'destroy'])->middleware('admin');
Route::post('/films/search', [FilmController::class, 'search']);

//Удаление актёра из фильма
Route::delete('/films/{film}/actors/{actor}', [FilmController::class, 'deleteActor'])
    ->middleware('admin');
//Удаление постера
Route::delete('/films/{film}/posters/{poster}', [PosterController::class, 'destroy'])
    ->middleware('admin');

Route::post('/genres',[GenreController::class, 'store'])->middleware('admin');
Route::delete('/genres/{genre}', [GenreController::class, 'destroy'])->middleware('admin');    
//Новости События
Route::post('/events',[EventController::class, 'store'])->middleware('admin');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->middleware('admin');
Route::get('/events/{event}', [EventController::class, 'show']);
Route::post('/events',[EventController::class, 'index']);

//Отзывы
Route::post('/films/{film}/ratings',[RatingController::class, 'store'])->middleware('auth');
Route::put('/films/{film}/ratings/{rating}',[RatingController::class, 'update'])->middleware('auth');
Route::delete('/films/{film}/ratings/{rating}',[RatingController::class, 'destroy'])->middleware('auth');

//Избранное
Route::post('/favorites', [UserController::class, 'addFavorite'])->middleware('auth');
Route::delete('/favorites/{film}', [UserController::class, 'deleteFavorite'])->middleware('auth');