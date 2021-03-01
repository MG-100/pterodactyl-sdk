<?php

namespace mg_100\Pterodactyl\Managers\Nest;

use mg_100\Pterodactyl\Managers\Manager;
use mg_100\Pterodactyl\Resources\Collection;
use mg_100\Pterodactyl\Resources\Egg;

class NestEggManager extends Manager
{
    /**
     * Get a paginated collection of eggs.
     *
     * @param int   $nestId
     * @param int   $page
     * @param array $query
     *
     * @return Collection
     */
    public function paginate(int $nestId, int $page = 1, array $query = [])
    {
        return $this->http->get("nests/$nestId/eggs", array_merge([
            'page' => $page,
        ], $query));
    }

    /**
     * Get a egg instance by id.
     *
     * @param int   $nestId
     * @param int   $eggId
     * @param array $query
     *
     * @return Egg
     */
    public function get(int $nestId, int $eggId, array $query = [])
    {
        return $this->http->get("nests/$nestId/eggs/$eggId", $query);
    }
}
