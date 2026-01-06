<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Sereny\NovaPermissions\Policies\BasePolicy;

class ShopPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * The Shop key the Policy corresponds to.
     *
     * @var string
     */
    public $key = 'shop';
}