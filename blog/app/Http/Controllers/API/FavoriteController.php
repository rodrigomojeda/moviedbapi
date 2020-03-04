<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class FavoriteController extends Controller
{
    public function get(Request $request)
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
            return $client->getMoviesApi()->getMovie($id);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'query' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }
            $query = $request->get('query');
            $token = new \Tmdb\ApiToken('f200ea93d28d03201a0e1caee1ebd3e6');
            $client = new \Tmdb\Client($token);
            return $client->getSearchApi()->searchMovies($query);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
    public function remove(Request $request)
    {
        return "New bookmark stored";
    }

    public function destroy(Request $request)
    {
        return "New bookmark stored";
    }

    //
}
