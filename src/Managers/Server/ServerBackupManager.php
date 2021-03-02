<?php

namespace mg_100\Pterodactyl\Managers\Server;

use mg_100\Pterodactyl\Managers\Manager;
use mg_100\Pterodactyl\Resources\Backup;
use mg_100\Pterodactyl\Resources\User;

class ServerBackupManager extends Manager
{

    /**
     * Get a Backup by server id.
     *
     * @param mixed   $backupId
     * @param mixed   $serverId
     * @param array $query
     *
     * @return void
     */
    public function get($backupId, $serverId, array $query = [])
    {
        return $this->http->get("servers/$serverId/backups/$backupId", $query);
    }

    /**
     * Create a new Backup.
     *
     * @param mixed $serverId
     * @param array $data
     *
     * @return void
     */
    public function create($serverId, array $data)
    {
        return $this->http->post("servers/$serverId/backups", $query);
    }

    /**
     * Get a download link for the backup by server id.
     *
     * @param mixed   $backupId
     * @param mixed   $serverId
     *
     * @return void
     */
    public function download($backupId, $serverId)
    {
        return $this->http->get("servers/$serverId/backups/$backupId/download");
    }

    /**
     * Delete the given Backup.
     *
     * @param mixed $serverId
     * @param mixed $backupId
     *
     * @return void
     */
    public function delete($serverId, $backupId)
    {
        return $this->http->delete("servers/$serverId/backups/$backupId");
    }

}