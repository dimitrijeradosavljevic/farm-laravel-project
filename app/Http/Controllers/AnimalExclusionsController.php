<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Birth;
use App\Exclusion;
use App\Animal;

class AnimalExclusionsController extends Controller
{

    public function index(Animal $animal)
    {
        $this->authorize('modify', $animal);

        $exclusions = $animal->exclusions->load('birth');
        return view('exclusions.index', compact('exclusions', 'animal'));
    }

    public function create(Animal $animal)
    {

        $this->authorize('modify', $animal);

        //If the animal is male, don't allow access
        if($animal->gender !== 0){
            return redirect()->back();
        }

        return view('exclusions.create', compact('animal'));
    }

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
    		$birth = Birth::findBirth($request->birth_certificate);
    	    if($birth){
                $attributes['birth_id'] = $birth;
            }else{
    	        session()->flash('error', 'Nije pronadjeno rodjenje sa cerifikatom koji ste uneli.');
    	        return redirect()->back();

            }
    	}

    	$created = Exclusion::create($attributes);

    	if($created){
            session()->flash('success', 'Uspesno ste dodali zalucenje');
        }else{
    	    session()->flash('error', 'Doslo je do greske. Zalucenje nije dodato');
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

        $exclusions = $animal->exclusions->load('birth');

        return view('exclusions.edit', compact('animal','exclusions'));
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
            $birth = Birth::findBirth($request->birth_certificate);
        }
        if($birth){
            $attributes['birth_id'] = $birth;
        }else{
            session()->flash('error', 'Nije pronadjeno rodjenje sa cerifikatom koji ste uneli. Zbog toga ce polje ostati prazno, mozete ga naknadno promeniti');
        }
        $updated = $exclusion->update($attributes);


        if($updated){
            session()->flash('success', 'Uspesno ste promenili zalucenje');
        }else{
            session()->flash('error', 'Doslo je do greske. Zalucenje nije promenjeno');
        }
        return redirect()->back();
    }

    public function destroy(Animal $animal, Exclusion $exclusion)
    {
        $this->authorize('modify', $animal);

        $deleted = $exclusion->delete();

        if($deleted){
            session()->flash('success', 'Uspesno ste obrisali zalucenje');
        }else{
            session()->flash('error', 'Doslo je do greske, zalucenje nije obrisano');
        }

        return redirect()->back();
    }
}
