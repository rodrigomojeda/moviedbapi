<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class MoviedbController extends Controller
{


    public function get($id)
    {

        $token  = new \Tmdb\ApiToken('f200ea93d28d03201a0e1caee1ebd3e6');
        $client = new \Tmdb\Client($token);
        $movie = $client->getMoviesApi()->getMovie($id);
        dump($movie);
    }

    public function create()
    {

        return "New bookmark stored";
    }
    //
}
