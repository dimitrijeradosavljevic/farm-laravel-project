<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Birth;
use App\Animal;

class AnimalBirthsController extends Controller
{
    public function store(Request $request, Animal $animal)
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

    	Birth::create($attributes);

    	return redirect()->back();

    }

    public function edit(Animal $animal)
    {
        $this->authorize('modify', $animal);

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

        $birth->update($attributes);

        return redirect()->back();
    }

    public function destroy(Animal $animal, Birth $birth)
    {
        $this->authorize('modify', $animal);

        $birth->delete();

        return redirect()->back();
    }
}
