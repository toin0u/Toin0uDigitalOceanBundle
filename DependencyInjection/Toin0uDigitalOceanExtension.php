<?php

/**
 * This file is part of the Toin0uDigitalOceanBundle library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Toin0u\DigitalOceanBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 */
class Toin0uDigitalOceanExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config        = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        if (isset($config['adapter']['class']) && !empty($config['adapter']['class'])) {
            $container->setParameter('toin0u_digital_ocean.adapter.class', $config['adapter']['class']);
        }

        $container->setParameter('toin0u_digital_ocean.credentials.client_id', $config['credentials']['client_id']);
        $container->setParameter('toin0u_digital_ocean.credentials.api_key', $config['credentials']['api_key']);
    }
}
