<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //opening the blade file in laravel through  controller
    public function index($name){
        return view('user', compact('name'));
    }
}
