<?php

namespace App\Policies;

use App\Model\Bunch;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BunchPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Bunch $bunch)
    {
        return $user->id === $bunch->user_id;
    }
}
