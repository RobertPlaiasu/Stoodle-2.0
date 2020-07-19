<?php

namespace App\Http\Controllers;

use App\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    /**
     * Favorite a particular post
     *
     * @param  Post $post
     * @return Response
     */
    public function favorite(College $college)
    {
        Auth::user()->favorites()->attach($college->id);

        return back();
    }

    /**
     * Unfavorite a particular post
     *
     * @param  Post $post
     * @return Response
     */
    public function unFavorite(College $college)
    {
        Auth::user()->favorites()->detach($college->id);

        return back();
    }
}
