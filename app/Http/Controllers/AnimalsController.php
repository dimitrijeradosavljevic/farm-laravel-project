<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AnimalsController extends Controller
{

    public function show(Animal $animal)
    {
            $this->authorize('modify', $animal);

            return view('animals.show', compact('animal'));


    }

    public function edit(Animal $animal)
    {
            $this->authorize('modify', $animal);

            return view('animals.edit', compact('animal'));


    }


}
