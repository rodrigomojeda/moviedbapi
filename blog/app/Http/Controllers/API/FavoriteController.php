<?php

namespace App\Http\Controllers\API;

use App\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;
use Validator;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }
            $id = $request->get('id');
            $token = new \Tmdb\ApiToken('f200ea93d28d03201a0e1caee1ebd3e6');
            $client = new \Tmdb\Client($token);
            $movie = $client->getMoviesApi()->getMovie($id);
            if($movie){
                $favorite = new Favorite();
                $favorite->user_id = Auth::user()->id;
                $favorite->movie_id = $id;
                $favorite->metadata = json_encode($movie);
                $favorite->save();
                return response()->json(['success' => 'Movie saved to favorites'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function get(Request $request)
    {
        try {
            $favorites = Favorite::where(['user_id' => Auth::user()->id])->get();
            return $favorites;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function destroy(Request $request)
    {
        return "New bookmark stored";
    }

    //
}
