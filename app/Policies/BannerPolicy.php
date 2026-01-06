<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Sereny\NovaPermissions\Policies\BasePolicy;

class BannerPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * The Banner key the Policy corresponds to.
     *
     * @var string
     */
    public $key = 'banner';
}