<?php

namespace CedricZiel\L5Shariff;

use GuzzleHttp\Client;
use Heise\Shariff\Backend as ShariffBackend;
use Heise\Shariff\Backend\BackendManager;
use Heise\Shariff\Backend\ServiceFactory;
use Illuminate\Config\Repository as ConfigRepositor;

/**
 * Class Backend
 * Extends the default backend to be able to interact with the
 * Request/Response API
 *
 * @package CedricZiel\L5Shariff
 */
class Backend extends ShariffBackend
{
    /**
     * Backend constructor.
     *
     * @param Cache $cache
     * @param ConfigRepositor $config
     */
    public function __construct(Cache $cache, ConfigRepositor $config)
    {
        $config = $config->get('shariff', []);

        $domain = $config['domain'];
        $clientOptions = [];
        if (isset($config['client'])) {
            $clientOptions = $config['client'];
        }
        $client = new Client(['defaults' => $clientOptions]);
        $baseCacheKey = md5(json_encode($config));

        $serviceFactory = new ServiceFactory($client);

        $this->backendManager = new BackendManager(
            $baseCacheKey,
            $cache,
            $client,
            $domain,
            $serviceFactory->getServicesByName($config['services'], $config)
        );
    }
}
