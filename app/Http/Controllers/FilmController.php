<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Director;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $films = Film::with(['genres', 'actors'])->withAvg('ratings', 'rating');
        $genre = $request->genre;
        if ($request->genre) {
            $films = $films->whereHas('genres', function ($q) use ($genre) {
                $q->whereIn('genres.id', $genre);
            });
        }
        if ($request->actors) {
            $param = $request->actors;
            $films = $films->whereHas('actors', function ($q) use ($param) {
                $q->whereIn('actors.id', $param);
            });
        }
        if ($request->genre) {
            
            $param = $request->genre;
            $films = $films->whereHas('genres', function ($q) use ($param) {
                $q->whereIn('genres.id', $param);
            });
        }
        if ($request->dateFrom and $request->dateTo) 
        {
            $films = $films->whereBetween('date', [$request->dateFrom, $request->dateTo]);
        }
        if ($request->order == 1) 
        {
            $films = $films->orderBy('date', 'asc');
        }
        if ($request->order == 2) 
        {
            $films = $films->orderBy('date', 'desc');
        }
        if ($request->order == 3) 
        {
          
        $films = $films->orderBy('ratings_avg_rating', 'desc');
        }
        if($request->order == 4)
        {
        $films = $films->orderBy('ratings_avg_rating', 'asc');
        }
        
    
        $actors = Actor::all();
        $genres = Genre::all();
        $directors = Director::all();
        return view('welcome', ['films' => $films->paginate(5), 'genres' => $genres, 'actors' => $actors, 'directors' => $directors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function create()//
    //{
    //
    //}//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $film = new Film();
        $film->title = $request->title;
        $film->date = $request->date;
        $film->director_id = $request->director_id;
        $path = $request->file('poster')->store('public');
        $film->poster = Storage::url($path);
        $film->save();
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        $actors = Actor::all();
        $genres = Genre::all();
        return view('film', ['film' => $film, 'actors' => $actors, 'genres' => $genres]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        if ($request->actor)
            $film->actors()->syncWithoutDetaching($request->actor);
        if ($request->poster) {
            $path = $request->file('poster')->store('public');
            $url = Storage::url($path);
            $poster = new Poster();
            $poster->url = $url;
            $poster->film_id=$film->id;
            $poster->save();
        }
        if (request()->title) {
            $film->genres()->sync($request->title);
        }
        return redirect("/films/$film->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return redirect('/admin');
    }
    public function deleteActor(Film $film, Actor $actor)
    {
        $film->actors()->detach($actor);
        //$actors = Actor::all();
        return redirect("/films/$film->id");
    }
    public function search(Request $request)
    {
        $films = Film::where('title', 'like', "%$request->str%")->get();
        return view('search', ['films' => $films]);
    }
}
