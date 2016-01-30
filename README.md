# Laravel 5 Backend for Heise Shariff

[![Dependency Status](https://www.versioneye.com/user/projects/56a780b27e03c7003ba3ff48/badge.svg?style=flat)](https://www.versioneye.com/user/projects/56a780b27e03c7003ba3ff48)

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
    CedricZiel\L5Shariff\ShariffServiceProvider::class
```

## Configuration

The ServiceProvider registers a default `shariff` route, so you can use it without any additional modifications.

Per default, the route to the shariff service is `/_shariff`. You override it, by simply overriding the route
definition given in `src/routes.php` in your own `routes.php`.

## Frontend assets

[Shariff](https://github.com/heiseonline/shariff) is available via NPM.

Installation: 

```bash
npm install shariff --save
```

Include the css from the npm package into your SCSS stylesheet:

```scss
@import "node_modules/shariff/build/shariff.complete";
```

Include the JavaScript to your JavaScript file `resources/assets/scripts/app.js` with browserify:

```javascript
var Shariff = require('shariff/src/js/shariff');
jQuery(document).ready(function ($) {
    App.init();
    var buttonsContainer = $('.shariff-init');
    new Shariff(buttonsContainer);
});
```

To override config options, you can put them in an object hash as second constructor argument:

```javascript
new Shariff(buttonsContainer, {
    orientation: 'vertical'
});
```

For an overview of the available options, please have a look at the 
[original reference](https://github.com/heiseonline/shariff#options-data-attributes).

If you use different asset files than the standard ones mentioned, you probably know what to do :)

## Usage

You can easily display the buttons by including a blade template and pass some options.

Allowed options are:

* theme (color|grey) Default: `grey`
* url Default: current url
* layout (horizontal|vertical) Default: `horizontal`
* services Default: `[&quot;whatsapp&quot;,&quot;facebook&quot;,&quot;twitter&quot;,&quot;googleplus&quot;,&quot;mail&quot;]`
* title Default: `Here is something I wanted to share with you!`

```blade
@include('shariff', ['shariff_opts' => ['url' => 'http://..', 'layout' => 'horizontal', 'title' => 'Cool title!']])
```

Or:

```blade
@include('shariff::buttons', ['shariff_opts' => ['theme' => 'color']])
```

TODO: Add helper

## Advanced

You can publish the the config and the templates and customize / override them when needed.

```bash
# To publish the config (`config_path('shariff.php')`)
php artisan vendor:publish --provider="CedricZiel\L5Shariff\ShariffServiceProvider" --tag="config"

# To publish the views for you to customize (`resource_path('views/vendor/shariff')`)
php artisan vendor:publish --provider="CedricZiel\L5Shariff\ShariffServiceProvider" --tag="views"
```

## License

The MIT License. Cedric Ziel <cedric@cedric-ziel.com>
