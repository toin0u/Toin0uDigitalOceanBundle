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

use Symfony\Component\Config\Definition\Processor;
use Toin0u\DigitalOceanBundle\Tests\TestCase;
use Toin0u\DigitalOceanBundle\DependencyInjection\Configuration;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 */
class ConfigurationTest extends TestCase
{
    protected $treeBuilder;
    protected $processor;

    protected function setUp()
    {
        $configuration     = new Configuration();
        $this->treeBuilder = $configuration->getConfigTreeBuilder();
        $this->processor    = new Processor();
    }

    /**
     * @expectedException Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     * @expectedExceptionMessage The path "toin0u_digital_ocean.credentials.client_id" cannot contain an empty value, but got null.
     * @return [type] [description]
     */
    public function testGetconfigWithoutCredentialsTreeBuilder()
    {
        $config = $this->loadConfig('config_without_credentials.yml');
        $this->processor->process($this->treeBuilder->buildTree(), $config);
    }

    public function testGetConfigWithoutAdapterTreeBuilder()
    {
        $config = $this->loadConfig('config_without_adapter.yml');
        $this->processor->process($this->treeBuilder->buildTree(), $config);
    }

    public function testGetConfigWithAdapterTreeBuilder()
    {
        $config = $this->loadConfig('config_with_adapter.yml');
        $this->processor->process($this->treeBuilder->buildTree(), $config);
    }
}
