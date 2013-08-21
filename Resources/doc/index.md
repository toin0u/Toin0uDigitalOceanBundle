Toin0uDigitalOceanBundle
========================

Integration of the [**DigitalOcean**](https://github.com/toin0u/DigitalOcean) library into Symfony2 version 2.1.*.


Installation
------------

Require [`toin0u/digitalocean-bundle`](https://packagist.org/packages/toin0u/digitalocean-bundle)
to your `composer.json` file:

```json
{
    "require": {
        "toin0u/digitalocean-bundle": "~0.1"
    }
}
```

Register the bundle in `app/AppKernel.php`:

```php
// app/AppKernel.php
public function registerBundles()
{
    return array(
        // ...
        new Toin0u\DigitalOceanBundle\Toin0uDigitalOceanBundle(),
    );
}
```

Enable the bundle's configuration in `app/config/config.yml`:

``` yaml
# app/config/config.yml
toin0u_digital_ocean: ~
```

Usage
-----

This bundle registers a toin0u_digital_ocean.digitalocean` service which is an instance of `DigitalOcean`.
You'll be able to do whatever you want with it but be sure to configure the **client ID** and the **API Key** first.

Reference Configuration
-----------------------

You'll find the reference configuration below:

``` yaml
# app/config/config*.yml

toin0u_digital_ocean:
    adapter:
        class:     ~
    credentials:
        client_id: YOUR_CLIENT_ID
        api_key:   YOUR_API_KEY
```

The default adapter is `CurlHttpAdapter`. Read more about the adapter [here](https://github.com/toin0u/HttpAdapter).


Testing
-------

Setup the test suite using [Composer](http://getcomposer.org/):

    $ composer install --dev

Run it using PHPUnit:

    $ phpunit
