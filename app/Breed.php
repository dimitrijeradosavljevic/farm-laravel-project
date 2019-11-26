<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $guarded = [];

    public function animals()
    {
    	return $this->hasMany(Animal::class);
    }

    public function species()
    {
    	return $this->belongsTo(Species::class);
    }
}
