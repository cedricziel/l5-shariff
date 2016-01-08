<?php

/*
 * Configuration for Heise Shariff
 */
return [
    /*
     * Cache configuration
     */
    'cache'    => [
        // Default cache time in seconds
        'ttl'    => 60,
        // Cache key prefix to avoid collisions
        'prefix' => 'shariff'
    ],

    /*
     * Default URL that is the subject of
     * the share buttons.
     *
     * Falls back to the request base URL
     */
    'domain'   => '',

    /*
     * Globally enabled services
     */
    'services' => [
        'GooglePlus',
        'Facebook',
        'LinkedIn',
        'Reddit',
        'StumbleUpon',
        'Flattr',
        'Pinterest',
        'Xing',
        'AddThis'
    ]
];
