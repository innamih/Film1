<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Poster;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    public function destroy(Film $film, Poster $poster)
    {
        $poster->delete();
        return redirect("/films/$film->id");
    }
}
