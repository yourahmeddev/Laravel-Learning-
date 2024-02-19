<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // returning user blade from the User Controller
    public function index($user){
        return view('user', ['name'=> $user]);
    }
}
