<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Animal extends Model{

	protected $guarded = [];


	public function births()
	{
		return $this->hasMany(Birth::class)->orderByDesc('date');
	}


	public function matings()
	{
		if($this->gender == 1){
			return $this->belongsToMany(Animal::class, 'matings', 'male_id', 'female_id')->withPivot('date', 'birth_id','id')->orderByDesc('date');
		}
		return $this->belongsToMany(Animal::class, 'matings', 'female_id', 'male_id')->withPivot('date', 'birth_id','id')->orderByDesc('date');

	}

	public function getMatings()
    {
        if($this->gender == 1){
            return $this->hasMany(Mating::class, 'male_id')->orderByDesc('date');
        }else{
            return $this->hasMany(Mating::class, 'female_id')->orderByDesc('date');
        }
    }

	public function exclusions()
	{
		return $this->hasMany(Exclusion::class)->orderByDesc('date');
	}

	public function breed()
	{
		return $this->belongsTo(Breed::class);
	}

	public function getGenderNounAttribute()
	{
		if($this->gender === 1 && $this->breed->species->name == 'Svinja'){
			return 'Nerast';
		}elseif($this->gender === 0 && $this->breed->species->name == 'Svinja'){
			return 'Krmaca';
		}
	}

	public function getPartnerNounAttribute()
    {
        if($this->gender === 1 && $this->breed->species->name == 'Svinja'){
            return 'Krmaca';
        }elseif($this->gender === 0 && $this->breed->species->name == 'Svinja'){
            return 'Nerast';
        }
    }


    public function parents()
    {
        return $this->belongsToMany(Animal::class, 'animal_parent', 'animal_id', 'parent_id')->with('parents')->orderByDesc('gender');
    }

    public function getParents()
    {
        $family = array();
        foreach($this->parents as $key => $parent)
        {
            $family[1][] = $parent;
            foreach($parent->parents as $grandparent){
                 $family[2][] = $grandparent;
                foreach($grandparent->parents as $grnadGrandparent){
                    $family[3][] = $grnadGrandparent;
                }

            }

        }
        return $family;
    }

}
