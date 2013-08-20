<?php

/**
 * This file is part of the Toin0uDigitalOceanBundle library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

function includeIfExists($file) {
    if (file_exists($file)) {
        return include $file;
    }
}

if ((!$loader = includeIfExists(__DIR__ . '/../vendor/autoload.php'))) {
    die(<<<EOT
You need to install the project dependencies using Composer:
$ wget http://getcomposer.org/composer.phar
OR
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar install --dev
$ phpunit
EOT
    );
}

