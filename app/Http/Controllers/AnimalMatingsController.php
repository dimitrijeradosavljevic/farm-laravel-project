<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Mating;

class AnimalMatingsController extends Controller
{
    public function store(Request $request, Animal $animal)
    {

        $this->authorize('modify', $animal);

    	$request->validate([
    		'date' => ['required', 'date'],
    		'partner_id' => ['required'],
    		'birth_id' => ['nullable']
    	]);

    	$attributes['date'] = $request->date;
    	$attributes['birth_id'] = $request->birth_id;

    	//find partner animal and get the id
        $partner = Animal::where('id_number', $request->partner_id)->first('id');


        if($partner){
    	   $animal->matings()->attach($partner->id, $attributes);
        }else{
            session()->flash('animal_not_found', 'Nije pronadjena zivotinja sa ID Brojem koji ste uneli');
        }

    	return redirect()->back();
    }


    public function edit(Animal $animal)
    {
    	$this->authorize('modify', $animal);

        return view('matings.edit', compact('animal'));
    }

    public function update(Request $request, Animal $animal, Mating $mating)
    {
        $this->authorize('modify', $animal);

        $request->validate([
            'date' => ['required', 'date'],
            'partner_id' => ['required'],
            'birth_id' => ['nullable']
        ]);

        $attributes['date'] = $request->date;
        $attributes['birth_id'] = $request->birth_id;

        //find partner animal and get the id
        $partner = Animal::where('id_number', $request->partner_id)->first('id');

        if($partner){
            if($animal->gender == 0){
                $attributes['male_id'] = $partner->id;
            }else{
                $attributes['female_id'] = $partner->id;
            }

            $mating->update($attributes);
        }else{
            session()->flash('animal_not_found', 'Nije pronadjena zivotinja sa ID Brojem koji ste uneli');
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->authorize('modify', $animal);

        $mating = Mating::find($id);
        $mating->delete();
        return redirect()->back();
    }
}
