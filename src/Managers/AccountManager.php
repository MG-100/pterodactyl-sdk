<?php

namespace mg_100\Pterodactyl\Managers;

use mg_100\Pterodactyl\Resources\SystemPermissions;
use mg_100\Pterodactyl\Resources\User;

class AccountManager extends Manager
{
    /**
     * Get information of the account.
     *
     * @return User
     */
    public function details()
    {
        return $this->http->get('account');
    }

    /**
     * Get permissions of the account.
     *
     * @return SystemPermissions
     */
    public function permissions()
    {
        return $this->http->get('permissions');
    }
}
