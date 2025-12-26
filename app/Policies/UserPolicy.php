<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Sereny\NovaPermissions\Policies\BasePolicy;

class UserPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * The User key the Policy corresponds to.
     *
     * @var string
     */
    public $key = 'users';
}