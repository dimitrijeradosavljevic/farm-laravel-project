<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Birth extends Model
{
    protected $fillable = [
    	'date', 'birth_number', 'males', 'females', 'passed', 'mummified', 'animal_id'
    ];

    public function matings()
    {
    	return $this->hasMany(Mating::class);
    }

}
