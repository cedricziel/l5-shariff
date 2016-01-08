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

            if ($config->get('shariff.domain', '') !== '') {
                $alternateUrl = $config->get('shariff.domain', '');
            } else {
                $alternateUrl = $request->getSchemeAndHttpHost();
            }

            return $shariffBackend->get($alternateUrl);
        }
    ]
);
