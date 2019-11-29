<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Mating extends Model
{
    protected $guarded = [];


    public function birth()
    {
        return $this->belongsTo(Birth::class, 'birth_id');
    }


    public static function findPartner($partner_id)
    {
        $animal = Animal::where('id_number', $partner_id)->first('id');
        if($animal){
            return $animal->id;
        }
    }


}
