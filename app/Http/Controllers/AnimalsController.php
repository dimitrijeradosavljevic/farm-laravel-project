<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Animal2;
use App\Owner;
use App\Breed;
use Illuminate\Http\Request;


class AnimalsController extends Controller
{

    public function show(Animal $animal)
    {
        $this->authorize('view', $animal);

        $births = $animal->births->load('matings', 'exclusion', 'animal.matings');
        $matings = $animal->getMatings->where('birth_id', null);

        $animal->load('user', 'owner', 'parents', 'parents.parents', 'parents.parents.parents');

        $prefix = [];

        if($animal->parents[0] != null)
        {
            foreach($animal->parents[0]->parents as $grandparent)
                $prefix[0][] = $grandparent->gender ? 'O.O.' : 'O.M.';
        }

        if($animal->parents[1] != null)
        {
            foreach($animal->parents[1]->parents as $grandparent)
                $prefix[1][] = $grandparent->gender ? 'O.O.' : 'O.M.';
        }

        //dd($prefix);

        return view('animals.show', compact('animal', 'births', 'matings', 'prefix'));
    }

    public function store(Request $request, Owner $owner)
    {

        $attributes = $this->validateAnimal($request);

        $attributes['user_id'] = auth()->id();

        $attributes['breed_id'] = Breed::where('name', $attributes['breed_id'])->first()->id;

        $animal = $owner->animals()->create($attributes);

        if ($animal) {
            $animal->addParents($request->id_father, $request->id_mother);
            session()->flash('success', 'Uspesno ste dodali zivotinju');
        } else {
            session()->flash('error', 'Doslo je do greske, zivotinja nije dodata');
        }

        return redirect()->route('animals.show', compact(['owner', 'animal']));

    }

    public function edit(Owner $owner, Animal $animal)
    {
        $this->authorize('update', $animal);

        $breeds = Breed::all();
        $animal->load('parents');

        return view('animals.edit', compact('animal', 'owner', 'breeds'));
    }


    public function create(Owner $owner)
    {
        $breeds = Breed::all();
        return view('animals.create', compact('owner', 'breeds'));
    }

    public function update(Request $request, Owner $owner, Animal $animal)
    {
        $this->authorize('update', $animal);

        $attributes = $this->validateAnimal($request);

        $attributes['breed_id'] = Breed::where('name', $attributes['breed_id'])->first()->id;
        $attributes['owner_id'] = $owner->id;


        $updated_animal = $animal->update($attributes);


        if ($updated_animal) {
            $animal->addParents($request->id_father, $request->id_mother);
            session()->flash('success', 'Uspesno ste izmenili podatke o zivotinji');
        } else {
            session()->flash('error', 'Doslo je do greske, zivotinja nije dodata');
        }

        return redirect()->route('animals.show', compact('owner', 'animal'));
    }

    public function destroy(Animal $animal)
    {
        $this->authorize('delete', $animal);

        $deleted = $animal->delete();

        if ($deleted) {
            session()->flash('success', 'Uspesno ste obrisali zivotinju');
        }

        return redirect()->route('users.home');
    }

    public function validateAnimal(Request $request)
    {
        return $request->validate([

            'id_number'             => ['required', 'numeric'],
            'identification_number' => ['required', 'numeric'],
            'hb'                    => ['required', 'string'],
            'rb'                    => ['required', 'string'],
            'birth_day'             => ['required', 'date'],
            'gender'                => ['required', 'boolean'],
            'left_tits'             => ['required', 'numeric'],
            'right_tits'            => ['required', 'numeric'],
            'selection_mark'        => ['required', 'string'],
            'registration_number'   => ['required', 'numeric'],
            'tattoo_number'         => ['required', 'numeric'],
            'birth_type'            => ['required', 'string'],
            'breed_id'              => ['required', 'string'],
            'exclusion_date'        => ['required', 'date'],
            'exclusion_reason'      => ['required', 'string'],
            'days_in_first_mating'  => ['required', 'numeric'],
        ]);
    }

}
