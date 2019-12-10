<?php

namespace App\Policies;

use App\Animal;
use App\User;
use App\Owner;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnimalPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Animal $animal)
    {
        return $this->modify($user, $animal);
    }

    public function create(User $user, Animal $animal)
    {
        return $this->modify($user, $animal);
    }

    public function update(User $user, Animal $animal)
    {
        return $this->modify($user, $animal);
    }

    public function delete(User $user, Animal $animal)
    {
        return $this->modify($user, $animal);
    }

    private function modify(User $user, Animal $animal)
    {
        return $user->id == $animal->user_id;
    }
}
