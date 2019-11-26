<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Animal2;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    public function show()
    {
        $regularAnimal = Animal::find(3);



        return view('show', compact('regularAnimal'));
    }
}
