<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $guarded = [];


    public function mother()
    {
        return $this->belongsTo(Animal::class, 'mother_id');
    }

    public function parents()
    {
        return $this->belongsToMany(Animal::class, 'animal_parent', 'animal_id', 'parent_id')->with('parents');
    }
}
