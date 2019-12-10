<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Owner;

class UsersController extends Controller
{
    public function home(User $user)
    {
        $owners = Owner::where('user_id', auth()->id())->get();
        $owners_count = $owners->count() * 6;

        $owners->load(['animals' => function($query) use ($owners_count){
            $query->take($owners_count);
        }]);

    	return view('users.home', compact('owners'));
    }
}
