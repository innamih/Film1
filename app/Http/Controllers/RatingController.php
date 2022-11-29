<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Film $film)
    {
        $rating = new Rating();
        $rating->rating = $request->rating;
        $rating->review = $request->review;
        $rating->film_id = $film->id;
        $rating->user_id = Auth::user()->id;
        $rating->save();
        return redirect("/films/$film->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(Request $request, Film $film, Rating $rating)
    {
        $rating->status = 1;
        $rating->save();
        return redirect ('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film, Rating $rating)
    {
        $rating->delete();
        return redirect ('/admin');
    }
}
