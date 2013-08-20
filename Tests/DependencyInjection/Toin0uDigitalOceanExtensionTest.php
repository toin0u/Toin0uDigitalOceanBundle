<?php

/**
 * This file is part of the Toin0uDigitalOceanBundle library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Toin0u\DigitalOceanBundle\Tests\DependencyInjection;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Toin0u\DigitalOceanBundle\Tests\TestCase;
use Toin0u\DigitalOceanBundle\DependencyInjection\Toin0uDigitalOceanExtension;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 */
class Toin0uDigitalOceanExtensionTest extends TestCase
{
    protected $container;
    protected $extension;

    protected function setUp()
    {
        $this->container = new ContainerBuilder();
        $this->extension = new Toin0uDigitalOceanExtension();
    }

    public function testLoadWithoutAdapter()
    {
        $config = $this->loadConfig('config_without_adapter.yml');

        $this->extension->load($config, $this->container);
        $this->container->compile();

        $this->assertInstanceOf('DigitalOcean\\DigitalOcean', $this->container->get('digitalocean'));
        $this->assertInstanceOf('DigitalOcean\\DigitalOcean', $this->container->get('toin0u_digital_ocean.digitalocean'));
    }

    public function testLoadWithdapter()
    {
        $config = $this->loadConfig('config_with_adapter.yml');

        $this->extension->load($config, $this->container);
        $this->container->compile();

        $this->assertInstanceOf('DigitalOcean\\DigitalOcean', $this->container->get('digitalocean'));
        $this->assertInstanceOf('DigitalOcean\\DigitalOcean', $this->container->get('toin0u_digital_ocean.digitalocean'));
    }
}
