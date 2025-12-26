<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Sereny\NovaPermissions\Policies\BasePolicy;

class SliderPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * The Slider key the Policy corresponds to.
     *
     * @var string
     */
    public $key = 'slider';
}