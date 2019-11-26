<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Birth extends Model
{
    protected $guarded = [];

    public function matings()
    {
    	return $this->hasMany(Mating::class);
    }

    public function exclusion()
    {
    	return $this->hasOne(Exclusion::class);
    }

    public function animal()
    {
    	return $this->belongsTo(Animal::class);
    }

}
