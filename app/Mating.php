<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mating extends Model
{
    protected $fillable = ['date', 'animal_id', 'partner_id', 'birth_id'];
}
