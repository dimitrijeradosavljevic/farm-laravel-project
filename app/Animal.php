<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Animal extends Model
{

    protected $guarded = [];


    public function births()
    {
        return $this->hasMany(Birth::class)->orderByDesc('date');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function matings()
    {
        if ($this->gender == 1) {
            return $this->belongsToMany(Animal::class, 'matings', 'male_id', 'female_id')->withPivot('date', 'birth_id', 'id')
                ->orderByDesc('date');
        }

        return $this->belongsToMany(Animal::class, 'matings', 'female_id', 'male_id')->withPivot('date', 'birth_id', 'id')
            ->orderByDesc('date');
    }

    public function getMatings()
    {
        if ($this->gender == 1) {
            return $this->hasMany(Mating::class, 'male_id')->orderByDesc('date');
        }

        return $this->hasMany(Mating::class, 'female_id')->orderByDesc('date');
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
        if ($this->breed->specie->name == 'Svinja') {
            return $this->gender === 1 ? 'Nerast' : 'Krmaca';
        }
    }

    public function getPartnerNounAttribute()
    {
        if ($this->gender === 1 && $this->breed->specie->name == 'Svinja') {
            return 'Krmaca';
        } elseif ($this->gender === 0 && $this->breed->specie->name == 'Svinja') {
            return 'Nerast';
        }
    }


    public function parents()
    {
        return $this->belongsToMany(Animal::class, 'animal_parent', 'animal_id', 'parent_id')->orderByDesc('gender');
    }

    public function addParents($father_id_number, $mother_id_number)
    {
        $parents = array();

        $father = Animal::where('id_number', $father_id_number)->first();

        if ($father) {
            if ($father->gender == 0) {
                $father = null;
            } else {
                $parents['father'] = $father->id;
            }
        }

        $mother = Animal::where('id_number', $mother_id_number)->first();
        if ($mother) {
            if ($mother->gender == 1) {
                $mother = null;
            } else {
                $parents['mother'] = $mother->id;
            }
        }

        if ($parents) {
            $this->parents()->sync($parents);
        }

    }

    public function getMother()
    {
        $mother = $this->parents->where('gender', 0)->first();
        if ($mother) {
            return $mother->id_number;
        }
        return '';
    }

    public function getFather()
    {
        $father = $this->parents->where('gender', 1)->first();
        if ($father) {
            return $father->id_number;
        }
        return '';
    }

    public function family()
    {
        return $this->belongsToMany(Animal::class, 'animal_parent', 'animal_id', 'parent_id')->orderByDesc('gender')->with('family');
    }

    public function getFamily()
    {
        $family = array();
        if($this->family->count() > 0) {
            $family[0] = $this->family;
        }
    }

}
