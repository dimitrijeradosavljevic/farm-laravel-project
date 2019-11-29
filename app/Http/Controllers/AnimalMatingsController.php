<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Mating;
use App\Birth;

class AnimalMatingsController extends Controller
{


    public function index(Animal $animal)
    {
        $this->authorize('modify', $animal);

        $mates_coll = $animal->matings;
        $mates = array();
        foreach($mates_coll as $mate){
            $mates[] = $mate->id_number;
        }

        $matings = $animal->getMatings->load('birth');

        return view('matings.index', compact('animal', 'mates', 'matings'));
    }

    public function create(Animal $animal)
    {
        $this->authorize('modify', $animal);

        return view('matings.create', compact('animal'));
    }


    public function store(Request $request, Animal $animal)
    {

        $this->authorize('modify', $animal);

    	$request->validate([
    		'date' => ['required', 'date'],
    		'partner_id' => ['required'],
    		'birth_certificate' => ['nullable']
    	]);

    	$attributes['date'] = $request->date;


    	$birth = Birth::findBirth($request->birth_certificate);
    	if($birth){
    	    $attributes['birth_id'] = $birth;
        }else{
    	    session()->flash('error', 'Nije pronadjeno rodjenje sa cerifikatom koji ste uneli. Zbog toga ce polje ostati prazno, mozete ga naknadno promeniti');
        }


        $partner = Mating::findPartner($request->partner_id);
        if($partner){
    	   $created = $animal->matings()->attach($partner, $attributes);
        }else{
            session()->flash('error', 'Nije pronadjena zivotinja sa ID Brojem koji ste uneli, molimo vas proverite ID Broj ponovo');
            $created = false;
        }

        //Check if creation was successful
        if($created) {
            session()->flash('success', 'Uspesno ste dodali pripust');
        }else{
            session()->flash('error', 'Pripust nije dodat, doslo je do greske');
        }

        return redirect(route('animals.show', $animal->id));
    }


    public function edit(Animal $animal)
    {
    	$this->authorize('modify', $animal);

    	//Getting id number of animals that are in matings relationship with current Animal
    	$mates_coll = $animal->matings;
        $mates = array();
        foreach($mates_coll as $mate){
            $mates[] = $mate->id_number;
        }

        $matings = $animal->getMatings->load('birth');

        return view('matings.edit', compact('animal', 'mates', 'matings'));
    }

    public function update(Request $request, Animal $animal, Mating $mating)
    {
        $this->authorize('modify', $animal);

        $request->validate([
            'date' => ['required', 'date'],
            'partner_id' => ['required'],
            'birth_certificate' => ['nullable']
        ]);

        $attributes['date'] = $request->date;

        $birth = Birth::findBirth($request->birth_certificate);
        if($birth){
            $attributes['birth_id'] = $birth;
        }else{
            session()->flash('error', 'Nije pronadjeno rodjenje sa cerifikatom koji ste uneli. Zbog toga ce polje ostati prazno, mozete ga naknadno promeniti');
        }


        $partner = Mating::findPartner($request->partner_id);
        if($partner){
            if($animal->gender == 0){
                $attributes['male_id'] = $partner->id;
            }else{
                $attributes['female_id'] = $partner->id;
            }

            $updated = $mating->update($attributes);
        }else{
            session()->flash('error', 'Nije pronadjena zivotinja sa ID Brojem koji ste uneli, molimo vas proverite ID Broj ponovo');
        }

        //Check if mating updated was successful
        if($updated){
            session()->flash('success', 'Uspesno ste promenili pripust');
        }else{
            session()->flash('error', 'Doslo je do greske, pripust nije promenjen');
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
