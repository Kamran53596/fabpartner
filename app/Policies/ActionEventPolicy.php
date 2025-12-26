<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Sereny\NovaPermissions\Policies\BasePolicy;

class ActionEventPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * The Action Event key the Policy corresponds to.
     *
     * @var string
     */
    public $key = 'actionEvent';
}