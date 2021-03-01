<?php

namespace mg_100\Pterodactyl\Managers;

use mg_100\Pterodactyl\Http;
use mg_100\Pterodactyl\Pterodactyl;

class Manager
{
    /**
     * The Pterodactyl instance.
     *
     * @var Pterodactyl
     */
    public $pterodactyl;

    /**
     * The Http client.
     *
     * @var Http
     */
    public $http;

    /**
     * The API type of the API key.
     *
     * @var string
     */
    public $apiType;

    public function __construct(Pterodactyl $pterodactyl)
    {
        $this->pterodactyl = $pterodactyl;

        $this->http = $this->pterodactyl->http;

        $this->apiType = $this->pterodactyl->apiType;
    }
}
