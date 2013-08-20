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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('toin0u_digital_ocean');

        $rootNode
            ->children()
            ->arrayNode('adapter')
                ->children()
                    ->scalarNode('class')->defaultNull()->end()
                ->end()
            ->end()
            ->arrayNode('credentials')
                ->children()
                    ->scalarNode('client_id')->isRequired()->cannotBeEmpty()->end()
                    ->scalarNode('api_key')->isRequired()->cannotBeEmpty()->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
