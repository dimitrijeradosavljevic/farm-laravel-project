<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{

    public function show(Animal $animal)
    {
        
        return view('show', compact('animal'));

    }

}
