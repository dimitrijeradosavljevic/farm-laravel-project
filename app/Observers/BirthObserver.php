<?php

namespace App\Observers;

use App\Birth;
use App\Mating;
use Carbon\Carbon;

class BirthObserver
{


    public function saved(Birth $birth)
    {
        $birth_date = Carbon::create($birth->date);
        $matings = Mating::where('birth_id', null)->where('female_id', $birth->animal_id)->where('date', '<', $birth_date->toDateString())->where('date', '>', $birth_date->subYear())->update(['birth_id' => $birth->id]);
        //Mass assignment update
    }

}
