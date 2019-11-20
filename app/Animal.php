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
}
