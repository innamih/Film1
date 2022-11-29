<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DirectorController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAdmin()) {
            $director = new Director();
            $director->name = $request->name;
            $director->save();
            return redirect('/admin');
        } else {
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Director $director)
    {
        if ($director->films->count() == 0){
            $director->delete();
        return redirect('/admin');
        }
        return redirect('admin')->withErrors(['error'=>'Не удалось удалить режиссёра']);

        
    }
}
