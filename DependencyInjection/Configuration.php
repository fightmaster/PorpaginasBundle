<?php

/*
 * This file is part of the PorpaginasBundle package.
 *
 * Copyright (c) Dmitry Petrov <old.fightmaster@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Porpaginas\PorpaginasBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    const PAGERFANTA = 'pagerfanta';
    const KNP_PAGINATOR = 'knp_paginator';

    /**
     * {@inheritdoc}
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('porpaginas')
            ->children()
                ->enumNode('paginator')
                    ->values(array(self::KNP_PAGINATOR, self::PAGERFANTA))
                    ->cannotBeEmpty()
                ->end()
        ;

        return $treeBuilder;
    }
}
