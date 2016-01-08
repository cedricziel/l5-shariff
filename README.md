# [WIP] Laravel 5 Backend for Heise Shariff

This package allows privacy-enabled share buttons on your site. With most sharing button solutions,
the user pays with its privacy to be able to share or even view the share buttons.

With the Heise Shariff, the application backend acts on the users behalf.

**Note: This package is a backend to [the original frontend package](https://github.com/heiseonline/shariff) 
and doesn't contain any frontend code.**

## Features

As of today, Shariff supports the following services:

* AddThis
* Facebook
* Flattr
* GooglePlus
* LinkedIn
* Pinterest
* Reddit
* StumbleUpon
* Xing

Please see the up-to-date list on the [Shariff Page](https://github.com/heiseonline/shariff-backend-php#supported-services).

This add-on also plugs into the standard laravel cache, so you dont have to worry too much about load.

## Installation

Install the package:

```bash
composer require cedricziel/l5-shariff
```

Add the service provider to your application configuration in `config/app.php`:

```php
    CedricZiel\L5Shariff\ShariffServiceProvider.php
```

Register the facade to your application in `config/app.php`:

```php
    'Shariff' => CedricZiel\L5Shariff\ShariffFacade::class
```

## Configuration

The ServiceProvider registers a default `shariff` route, so you can use it without any additional modifications.

Per default, the route to the shariff service is `/_shariff`. You override it, by simply overriding the route
definition given in `src/routes.php` in your own `routes.php`.

## Todo

* Maybe include frontend assets to form a coherent package?

## License

The MIT License. Cedric Ziel <cedric@cedric-ziel.com>
