<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class UserPolicy
{
    use HandlesAuthorization;

    public function isAdmin(User $user) {
        $admin = config('app.admin');
        return in_array($user->role, $admin);
    }

    public function before(User $user, $abikity) {
        if($this->isAdmin($user)) {
            return true;
        }
    }
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    // public function __construct()
    // {
        //
    // }
}
