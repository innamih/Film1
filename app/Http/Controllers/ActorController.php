<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actor = new Actor();
        $actor->name = $request->name;
        $actor->save();
        return redirect('/admin');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        if ($actor->films->count() == 0) {
            $actor->delete();
            return redirect('/admin');
        }
        return redirect('/admin')->withErrors(["error"=>"Не удалось удалить актёра"]);
    }

    public function addFilm()
    {
    }
}
