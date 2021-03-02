<?php

namespace mg_100\Pterodactyl\Managers\Server;

use mg_100\Pterodactyl\Managers\Manager;
use mg_100\Pterodactyl\Resources\Collection;
use mg_100\Pterodactyl\Resources\Backup;
use mg_100\Pterodactyl\Resources\User;

class ServerBackupManager extends Manager
{

    /**
     * Get a paginated collection of users.
     *
     * @param int   $page
     * @param array $query
     *
     * @return Collection
     */
    public function paginate(int $page = 1, array $query = [])
    {
        return $this->http->get('users', array_merge([
            'page' => $page,
        ], $query));
    }

    /**
     * Get a user instance by user id.
     *
     * @param mixed   $backupId
     * @param mixed   $serverId
     * @param array $query
     *
     * @return User
     */
    public function get($backupId, $serverId, array $query = [])
    {
        return $this->http->get("servers/$serverId/backups/$backupId", $query);
    }

    /**
     * Create a new user.
     *
     * @param mixed $serverId
     * @param array $data
     *
     * @return User
     */
    public function create($serverId, array $data)
    {
        return $this->http->post("servers/$serverId/backups", $query);
    }

    /**
     * Delete the given user.
     *
     * @param mixed $serverId
     * @param mixed $backupId
     *
     * @return void
     */
    public function delete($serverId, $backupId)
    {
        return $this->http->delete("servers/$serverId/backups/$backupId", $query);
    }

}