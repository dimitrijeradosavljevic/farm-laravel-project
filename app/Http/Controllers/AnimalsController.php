<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Animal2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Mating;
use Carbon\Carbon;

class AnimalsController extends Controller
{

    public function show(Animal $animal)
    {
            $this->authorize('modify', $animal);
            $births = $animal->births->load('matings', 'exclusion', 'animal.matings');


            return view('animals.show', compact('animal', 'births'));


    }

    public function edit(Animal $animal)
    {
            $this->authorize('modify', $animal);

            return view('animals.edit', compact('animal'));

    }

    public function create()
    {
        return view('animals.create');
    }
}
