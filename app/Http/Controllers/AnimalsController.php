<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    public function test($id)
    {
    	$animal = Animal::findOrFail($id);
    	return view('animals.test', compact('animal'));
    }
}
