<?php

/**
 * This file is part of the Toin0uDigitalOceanBundle library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Toin0u\DigitalOceanBundle\Tests;

use Symfony\Component\Yaml\Yaml;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 */
abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @return Yaml
     */
    protected function loadConfig($configfile)
    {
        return Yaml::parse(file_get_contents(__DIR__ . '/Fixtures/' . $configfile));
    }
}
