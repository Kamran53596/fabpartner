<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Sereny\NovaPermissions\Policies\BasePolicy;

class AdminPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * The Admin key the Policy corresponds to.
     *
     * @var string
     */
    public $key = 'admin';
}