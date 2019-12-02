<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Birth;
use App\Animal;

class AnimalBirthsController extends Controller
{

    public function index(Animal $animal)
    {
        $this->authorize('modify', $animal);

        return view('births.index', compact('animal'));
    }

    public function create(Animal $animal)
    {
        $this->authorize('modify', $animal);

        //If the animal is male, don't allow access
        if($animal->gender !== 0){
            return redirect()->back();
        }

        return view('births.create', compact('animal'));
    }


    public function store(Animal $animal, Request $request)
    {
    	$attributes = $request->validate([
    		'date' => ['required', 'date'],
    		'birth_number' => ['numeric', 'required'],
    		'males' => ['numeric', 'required'],
    		'females' => ['numeric', 'required'],
    		'passed' => ['numeric', 'required'],
    		'mummified' => ['numeric', 'nullable'],
    		'birth_certificate' => ['numeric', 'required']
		]);
    	$attributes['animal_id'] = $animal->id;

    	$created = Birth::create($attributes);

    	//Check if birth persisting was successful
    	if($created){
    	    session()->flash('success', 'Uspesno ste dodali prasenje');
        }else{
    	    session()->flash('error', 'Doslo je do greske. Prasenje nije dodato');
        }

    	return redirect(route('animals.show', $animal->id));

    }

    public function edit(Animal $animal)
    {
        $this->authorize('modify', $animal);

        //If the animal is male, don't allow access
        if($animal->gender !== 0){
            return redirect()->back();
        }

        return view('births.edit', compact('animal'));
    }

    public function update(Request $request, Animal $animal, Birth $birth)
    {
        $this->authorize('modify', $animal);

        $attributes = $request->validate([
            'date' => ['required', 'date'],
            'birth_number' => ['numeric', 'required'],
            'males' => ['numeric', 'required'],
            'females' => ['numeric', 'required'],
            'passed' => ['numeric', 'required'],
            'mummified' => ['numeric', 'nullable'],
            'birth_certificate' => ['numeric', 'required']
        ]);
        $attributes['animal_id'] = $animal->id;

        $updated = $birth->update($attributes);

        //Check if birth was updated
        if($updated){
            session()->flash('success', 'Uspesno ste promenili prasenje');
        }else{
            session()->flash('error', 'Doslo je do greske. Prasenje nije promenjeno');
        }

        return redirect()->back();
    }

    public function destroy(Animal $animal, Birth $birth)
    {
        $this->authorize('modify', $animal);

        $deleted = $birth->delete();

        if($deleted){
            session()->flash('success', 'Uspesno ste obrisali prasenje');
        }else{
            session()->flash('error', 'Doslo je do greske, prasenje nije obrisano');
        }

        return redirect()->back();
    }
}
