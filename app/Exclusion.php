<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exclusion extends Model
{
    protected $guarded = [];

    public function birth()
    {
        return $this->belongsTo(Birth::class);
    }
}
