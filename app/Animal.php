<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{	

	protected $fillable = ['name', 'breed', 'mother_id', 'father_id'];

    public function matings()
    {
    	return $this->belongsToMany(Animal::class, 'matings', 'animal_id', 'partner_id');
    }

    public function births()
    {
    	return $this->hasMany(Birth::class);
    }


    public function mother()
    {
    	return Animal::find($this->mother_id);
    }

    public function father()
    {
    	return Animal::find($this->father_id);
    }
    

    public function getMothers($count)
    {
    	 $i = 1;
    	 $mother = $this->mother();
    	 $mothers[$i] = $mother;

    	while($i < $count){
    		$i++;
    		$mothers[$i] = $mother->mother();

    	}

    	$father = $this->father();
    	
    	
    	return $mothers;
    }


}
