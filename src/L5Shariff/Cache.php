<?php

namespace CedricZiel\L5Shariff;

use Heise\Shariff\CacheInterface;
use Illuminate\Config\Repository as ConfigRepository;
use Illuminate\Cache\Repository as CacheRepository;

/**
 * Class Cache
 * Shariff cache implementation that uses the default cache of
 * the underlying Laravel application
 *
 * @package CedricZiel\L5Shariff
 */
class Cache implements CacheInterface
{
    /**
     * @var string
     */
    protected $defaultCache;

    /**
     * Prefix for cache keys
     *
     * @var string
     */
    protected $cachePrefix;

    /**
     * @var CacheRepository
     */
    protected $cacheRepository;

    /**
     * Time to live for cache items
     *
     * @var int
     */
    protected $cacheTtl;

    /**
     * @var ConfigRepository
     */
    protected $configurationRepository;

    /**
     * Cache constructor.
     *
     * @param ConfigRepository $config
     * @param CacheRepository $cache
     */
    public function __construct(ConfigRepository $config, CacheRepository $cache)
    {
        if ($config->get('cache.default') === '' || $config->get('shariff.cache.prefix') === '') {
            throw new \InvalidArgumentException('Either you didn\'t configure a default cache, or no cache key prefix');
        }

        $this->cachePrefix = $config->get('cache.prefix') . '-' . $config->get('shariff.cache.prefix');

        $this->configurationRepository = $config;
        $this->cacheRepository = $cache;
    }

    /**
     * Set cache entry
     *
     * @param string $key
     * @param string $content
     *
     * @return void
     */
    public function setItem($key, $content)
    {
        $key = $this->getKey($key);
        $ttl = $this->configurationRepository->get('shariff.cache.ttl');

        $this->cacheRepository->add($key, $content, $ttl);
    }

    /**
     * Calculates the internal cache key
     *
     * @param string $key
     *
     * @return string
     */
    protected function getKey($key)
    {
        return $this->cachePrefix . '-' . $key;
    }

    /**
     * Get cache entry
     *
     * @param string $key
     *
     * @return string
     */
    public function getItem($key)
    {
        $key = $this->getKey($key);

        return $this->cacheRepository->get($key);
    }

    /**
     * Check if cache entry exists
     *
     * @param string $key
     *
     * @return bool
     */
    public function hasItem($key)
    {
        $key = $this->getKey($key);

        return $this->cacheRepository->has($key);
    }
}
