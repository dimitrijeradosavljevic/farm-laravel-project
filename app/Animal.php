<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Animal extends Model{

	protected $guarded = [];


	public function births()
	{
		return $this->hasMany(Birth::class);
	}

	public function matings()
	{

		if($this->gender == 1){
			return $this->belongsToMany(Animal::class, 'matings', 'male_id', 'female_id')->withPivot('date', 'id');
		}else{
			return $this->belongsToMany(Animal::class, 'matings', 'female_id', 'male_id')->withPivot('date', 'id');
		}
	}

	public function exclusions()
	{
		return $this->hasMany(Exclusion::class);
	}

	public function breed()
	{
		return $this->belongsTo(Breed::class);
	}

	public function getGenderNounAttribute()
	{
		if($this->gender == 1 && $this->breed->species->name == 'Svinja'){
			return 'Nerast';
		}elseif($this->gender == 0 && $this->breed->species->name == 'Svinja'){
			return 'Krmaca';
		}
	}


    public function mother()
    {
        return $this->belongsTo(Animal::class, 'mother_id');
    }

    public function parents()
    {
        return $this->belongsToMany(Animal::class, 'animal_parent', 'animal_id', 'parent_id')->with('parents');
    }

}
