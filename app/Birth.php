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

    public static function findBirth($birth_certificate)
    {
        if($birth_certificate){
            $birth = Birth::where('birth_certificate', $birth_certificate)->first('id');
            if($birth){
                return $birth->id;
            }
        }
    }

}
