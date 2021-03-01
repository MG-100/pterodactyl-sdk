<?php

namespace mg_100\Pterodactyl;

use GuzzleHttp\Client as Client;
use mg_100\Pterodactyl\Exceptions\InvaildApiTypeException;
use mg_100\Pterodactyl\Managers\AccountManager;
use mg_100\Pterodactyl\Managers\LocationManager;
use mg_100\Pterodactyl\Managers\Nest\NestEggManager;
use mg_100\Pterodactyl\Managers\NestManager;
use mg_100\Pterodactyl\Managers\Node\NodeAllocationManager;
use mg_100\Pterodactyl\Managers\NodeManager;
use mg_100\Pterodactyl\Managers\Server\ServerDatabaseManager;
use mg_100\Pterodactyl\Managers\ServerManager;
use mg_100\Pterodactyl\Managers\UserManager;

class Pterodactyl
{
    /**
     * The Pterodactyl base uri.
     *
     * @var string
     */
    public $baseUri;

    /**
     * The Pterodactyl API key.
     *
     * @var string
     */
    public $apiKey;

    /**
     * The API type of the API key.
     *
     * @var string
     */
    public $apiType;

    /**
     * The Http client.
     *
     * @var Client
     */
    public $http;

    /**
     * Account manager.
     *
     * @var AccountManager
     */
    public $account;

    /**
     * Location manager.
     *
     * @var LocationManager
     */
    public $locations;

    /**
     * User manager.
     *
     * @var UserManager
     */
    public $users;

    /**
     * Nest manager.
     *
     * @var NestManager
     */
    public $nests;

    /**
     * Node manager.
     *
     * @var NodeManager
     */
    public $nodes;

    /**
     * Node allocation manager.
     *
     * @var NodeAllocationManager
     */
    public $node_allocations;

    /**
     * Nest egg manager.
     *
     * @var NestEggManager
     */
    public $nest_eggs;

    /**
     * Server manager.
     *
     * @var ServerManager
     */
    public $servers;

    /**
     * Server database manager.
     *
     * @var ServerDatabaseManager
     */
    public $server_databases;

    /**
     * Create a new Pterodactyl instance.
     *
     * @param string             $apiKey
     * @param \GuzzleHttp\Client $guzzle
     *
     * @return void
     */
    public function __construct($baseUri, $apiKey, $apiType = 'application', Client $guzzle = null)
    {
        $this->baseUri = $baseUri;

        $this->apiKey = $apiKey;

        if (!in_array($apiType, ['application', 'client'], true)) {
            throw new InvaildApiTypeException();
        }
        $this->apiType = $apiType;

        $this->http = new Http($this, $guzzle);

        $this->locations = new LocationManager($this);
        $this->users = new UserManager($this);
        $this->nests = new NestManager($this);
        $this->nest_eggs = new NestEggManager($this);
        $this->nodes = new NodeManager($this);
        $this->node_allocations = new NodeAllocationManager($this);
        $this->account = new AccountManager($this);
        $this->servers = new ServerManager($this);
        $this->server_databases = new ServerDatabaseManager($this);
    }
}
