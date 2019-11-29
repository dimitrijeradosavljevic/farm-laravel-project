<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Owner;

class UsersController extends Controller
{
    public function home(User $user)
    {

        $owners = Owner::where('user_id', auth()->id())->with('animals')->get();


    	return view('users.home', compact('owners'));
    }
}
