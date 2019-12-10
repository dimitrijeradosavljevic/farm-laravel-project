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
        $this->authorize('view', $animal);

        $matings = $animal->matings;

        return view('matings.index', compact('animal', 'matings'));
    }

    public function create(Animal $animal)
    {
        $this->authorize('create', $animal);

        return view('matings.create', compact('animal'));
    }


    public function store(Request $request, Animal $animal)
    {

        $this->authorize('create', $animal);

    	$request->validate([
    		'date' => ['required', 'date'],
    		'partner_id' => ['required'],
    		'birth_certificate' => ['nullable']
    	]);

    	$attributes['date'] = $request->date;

        if(!empty($request->birth_certificate)){
            $birth = Birth::findByCertificate($request->birth_certificate);
            if($birth){
                $attributes['birth_id'] = $birth->id;
            }else{
                session()->flash('warning', 'Nije pronadjeno rodjenje sa cerifikatom koji ste uneli. Zbog toga ce polje ostati prazno, mozete ga naknadno promeniti');
            }
        }

        $partner = Mating::findPartner($request->partner_id);

        if($partner['id']){
    	   $animal->matings()->attach($partner['id'], $attributes);
        }else{
            session()->flash('error', 'Nije pronadjena zivotinja sa ID Brojem koji ste uneli, molimo vas proverite ID Broj ponovo');
            return redirect(route('animals.show', $animal->id));
        }

        session()->flash('success', 'Uspesno ste dodali pripust');

        return redirect(route('animals.show', $animal->id));
    }


    public function edit(Animal $animal)
    {
    	$this->authorize('update', $animal);

    	$mates = $animal->matings;

        $matings = $animal->getMatings->load('birth');

        return view('matings.edit', compact('animal', 'mates', 'matings'));
    }

    public function update(Request $request, Animal $animal, Mating $mating)
    {
        $this->authorize('update', $animal);

        $request->validate([
            'date' => ['required', 'date'],
            'partner_id' => ['required'],
            'birth_certificate' => ['nullable']
        ]);

        $attributes['date'] = $request->date;

        if(!empty($request->birth_certificate)){
            $birth = Birth::findByCertificate($request->birth_certificate);
            if($birth){
                $attributes['birth_id'] = $birth->id;
            }else{
                session()->flash('warning', 'Nije pronadjeno rodjenje sa cerifikatom koji ste uneli. Zbog toga ce polje ostati prazno, mozete ga naknadno promeniti');
            }
        }


        $partner = Mating::findPartner($request->partner_id);
        if($partner){
            $attributes[$partner['gender']] = $partner['id'];

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

    public function destroy(Animal $animal, Mating $mating)
    {
        $this->authorize('delete', $animal);

        $deleted = $mating->delete();

        if($deleted){
            session()->flash('success', 'Uspesno ste obrisali pripust');
        }else{
            session()->flash('error', 'Doslo je do greske, pripust nije obrisan');
        }

        return redirect()->back();
    }
}
