<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Automation;
use Illuminate\Support\Facades\Auth;
use Validator;
class AutomationController extends Controller
{
    public function index(){
        return "Hello Dolly!";
    }

    public function show($id){
        return "Show ".$id;
    }

    public function store(){
        return "Store";
    }

    public function update($id){
        return "Update ".$id;
    }
    public function destroy(){
        return "Destroy";
    }

    public function schedule(){
        return "Schedule";
    }

    public function run($command){
        return "Command: ".$command;
    }
}
