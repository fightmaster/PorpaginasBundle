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

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * @author Dmitry Petrov <old.fightmaster@gmail.com>
 */
class PorpaginasExtension extends Extension
{
    /**
     * {@inheritDoc}
     *
     * @param array $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        if (Configuration::KNP_PAGINATOR === $config['paginator'] || Configuration::PAGERFANTA === $config['paginator']) {
            $loader->load($config['paginator'] . '.xml');
            $container->setAlias(
                'porpaginas.twig.rendering_adapter',
                sprintf('porpaginas.twig.rendering_adapter.%s', $config['paginator'])
            );
        }
    }
}
