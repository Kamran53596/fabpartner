<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Sereny\NovaPermissions\Policies\BasePolicy;

class CategoryPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * The Category key the Policy corresponds to.
     *
     * @var string
     */
    public $key = 'category';
}