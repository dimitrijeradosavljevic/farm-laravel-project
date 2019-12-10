<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    protected $guarded = [];

    public function breeds()
    {
    	return $this->hasMany(Breed::class);
    }

    public function animals()
    {
    	return $this->hasManyThrough(Animal::class, Breed::class);
    }

}
