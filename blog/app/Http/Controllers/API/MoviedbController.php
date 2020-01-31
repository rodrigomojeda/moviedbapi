<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class MoviedbController extends Controller
{


    public function get()
    {
        echo "hello dolly!";
    }

    public function create()
    {
        return " New bookmark stored";
    }
    //
}
