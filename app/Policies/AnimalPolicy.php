<?php

namespace App\Policies;

use App\Animal;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnimalPolicy
{
    use HandlesAuthorization;

    public function modify(User $user, Animal $animal)
    {
        return $user->id == $animal->user_id;
    }

}
