<?php

namespace App\Policies;

use App\Owner;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OwnerPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Owner $owner)
    {
        return $this->modify($user, $owner);
    }

    public function create(User $user, Owner $owner)
    {
        return $this->modify($user, $owner);
    }

    public function update(User $user, Owner $owner)
    {
        return $this->modify($user, $owner);
    }

    public function delete(User $user, Owner $owner)
    {
        return $this->modify($user, $owner);
    }

    private function modify(User $user, Owner $owner)
    {
        return $user->id == $owner->user_id;
    }
}
