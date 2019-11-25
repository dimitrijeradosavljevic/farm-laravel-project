<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Birth;
use App\Exclusion;
use App\Animal;

class AnimalExclusionsController extends Controller
{
    public function store(Request $request, Animal $animal)
    {
        $this->authorize('modify', $animal);

    	$request->validate([
    		'date' => ['required', 'date'],
    		'days_old' => ['required', 'numeric'],
    		'animals_count' => ['required', 'numeric'],
    		'litter_weight' => ['required', 'numeric'],
    		'mother_mark'   => ['required', 'numeric'],
    		'males_for_breeding' => ['required', 'numeric'],
    		'females_for_breeding' => ['required', 'numeric'],
    		'birth_certificate' => ['numeric', 'nullable'],
    	]);

		$attributes = $request->except('birth_certificate');
		$attributes['animal_id'] = $animal->id;

    	//Find birth based on certificate
    	if($request->has('birth_certificate')){
    		$birth = Birth::where('birth_certificate', $request->birth_certificate)->first('id');
    	}
    	$attributes['birth_id'] = $birth->id;

    	Exclusion::create($attributes);

    	return redirect()->back();
    }

    public function edit(Animal $animal)
    {
        $this->authorize('modify', $animal);

        return view('exclusions.edit', compact('animal'));
    }

    public function update(Request $request, Animal $animal, Exclusion $exclusion)
    {
        $this->authorize('modify', $animal);

        $request->validate([
            'date' => ['required', 'date'],
            'days_old' => ['required', 'numeric'],
            'animals_count' => ['required', 'numeric'],
            'litter_weight' => ['required', 'numeric'],
            'mother_mark'   => ['required', 'numeric'],
            'males_for_breeding' => ['required', 'numeric'],
            'females_for_breeding' => ['required', 'numeric'],
            'birth_certificate' => ['numeric', 'nullable'],
        ]);

        $attributes = $request->except('birth_certificate');
        $attributes['animal_id'] = $animal->id;

        //Find birth based on certificate
        if($request->has('birth_certificate')){
            $birth = Birth::where('birth_certificate', $request->birth_certificate)->first('id');
        }
        $attributes['birth_id'] = $birth->id;

        $exclusion->update($attributes);

        return redirect()->back();
    }

    public function destroy(Animal $animal, Exclusion $exclusion)
    {
        $this->authorize('modify', $animal);

        $exclusion->delete();

        return redirect()->back();
    }
}
