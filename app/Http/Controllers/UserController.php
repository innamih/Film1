<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Director;
use App\Models\Event;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $directors = Director::all();
            $actors = Actor::all();
            $genres = Genre::all();
            $films = Film::all();
            $events = Event::all();
            return view('admin', ['directors' => $directors, 'actors' => $actors, 'films' => $films, 'genres' => $genres, 'events' => $events]);
        } else
            return view('lk');
    }

    public function addFavorite(Request $request)
    {
        Auth::user()->films()->syncWithOutDetaching($request->film);
        return redirect('/');
    }

    public function deleteFavorite(Film $film)
    {
        Auth::user()->films()->detach([$film->id]);
        return view('lk');
    }
}
