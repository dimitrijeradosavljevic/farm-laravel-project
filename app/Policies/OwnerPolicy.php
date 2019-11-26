<?php

namespace App\Policies;

use App\Owner;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OwnerPolicy
{
    use HandlesAuthorization;

    public function modify(User $user, Owner $owner)
    {
        return $user->id == $owner->user_id;
    }
}
