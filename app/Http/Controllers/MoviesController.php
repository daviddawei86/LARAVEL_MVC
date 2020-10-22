<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MoviesController extends Controller
{
    public function showMovies($id='Hola'){
        //$user = Movie::findOrFail($id);
        return $id;
    }
        
  public function getShow($id){
    $movie = Movie::findOrFail($id);//()->attach(1);//->where('id',10);
    //$list = App\Post::find(1)->comments()->where('title', 'foo')->first();
    $list = $movie->users;//->where('User.email','Fbord@gmail.com')->get();
    return view('movie.show', compact('list'));
}
}
