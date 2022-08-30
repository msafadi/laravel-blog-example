<?php

namespace App\Policies;

use App\Models\User;

trait SuperAdmin
{
    public function before(User $user, $ability)
    {
        if ($user->id == 1) {       
            return true;
        }
    }
}