<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Animal2;
use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AnimalsController extends Controller
{

    public function show(Animal $animal)
    {
            $this->authorize('modify', $animal);

            $animal->load(['user', 'owner', 'breed', 'parents']);

            //dd($animal);

            //$this->sortParents($animal, 3);
            //dd($animal->parents);
            //dd($animal->parents, $animal->parents[0], $animal->parents[1], $animal->parents[0]->parents[0]);
//            $this->sortParents($animal->parents[0]);
//            $this->sortParents($animal->parents[1]);
//            $this->sortParents($animal->parents[0]->parents[0]);
//            $this->sortParents($animal->parents[0]->parents[1]);
//            $this->sortParents($animal->parents[1]->parents[0]);
//            $this->sortParents($animal->parents[1]->parents[1]);

            return view('animals.show', compact('animal'));
    }

    public function store(Request $request, Owner $owner)
    {
        // TODO() Autorizacija

        $attributes = $this->validateAnimal($request);

        $attributes['user_id'] = $request->user()->id;
        $animal = $owner->animals()->create($attributes);

        $animal->parents()->sync($request->get('parents'));

        return redirect()->route('animals.show', compact(['owner', 'animal']));
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

    public function update(Request $request, Owner $owner, Animal $animal)
    {
        $this->authorize('modify', $animal);

        $attributes = $this->validateAnimal($request);

        $animal->update($attributes);

        $animal->parents()->sync($request->get('parents'));

        return redirect()->route('animals.show', compact('owner', 'animal'));
    }

    public function validateAnimal(Request $request)
    {
        return $request->validate([

            'id_number' => 'required',
            'identification_number' => 'required',
            'hb' => 'required',
            'rb' => 'required',
            'birth_day' => 'required',
            'gender' => 'required',
            'owner_id' => 'required',
            'left_tits' => 'required',
            'right_tits' => 'required',
            'selection_mark' => 'required',
            'registration_number' => 'required',
            'tattoo_number' => 'required',
            //'birth_type' => 'required'
            //'breed_id' => 'required',
            //'exclusion_date' => 'required',
            //'exclusion_reason' => 'required',
            //'days_in_first_mating' => 'required',
        ]);
    }

    public function sortParents(Animal $animal, $depth)
    {
        if($animal == null || $depth == 0)
            return;

        while(count($animal->parents) < 2)
        {
            $animal->parents->push(null);
        }

        if($animal->parents[0] != null)
            $this->sortParents($animal->parents[0], $depth - 1);

        if($animal->parents[1] != null)
            $this->sortParents($animal->parents[1], $depth - 1);

        if($animal->parents[0] != null && !$animal->parents[0]->gender)
        {
            $animalHelp = $animal->parents[0];
            $animal->parents[0] = $animal->parents[1] ? $animal->parents[1] : null;
            $animal->parents[1] = $animalHelp;
        }
    }
}
