<?php

Route::get(
    '/_shariff',
    [
        'as'   => 'shariff',
        'uses' => function (
            \Illuminate\Http\Request $request,
            \CedricZiel\L5Shariff\Backend $shariffBackend,
            \Illuminate\Config\Repository $config
        ) {

            if ($request->query->has('url')) {
                return $shariffBackend->get($request->query->get('url'));
            }

            $alternateUrl = $config->get('shariff.domain', $request->getBaseUrl());

            return $shariffBackend->get($alternateUrl);
        }
    ]
);
