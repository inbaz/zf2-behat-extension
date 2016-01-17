<?php

/*
 * This file is part of the Behat ZF2Extension
 *
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Behat\ZF2Extension\ServiceContainer\Driver;

use Behat\MinkExtension\ServiceContainer\Driver\DriverFactory;
use Behat\ZF2Extension\ServiceContainer\ZF2Extension;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author Christophe Coevoet <stof@notk.org>
 */
final class SymfonyFactory implements DriverFactory
{
    /**
     * {@inheritdoc}
     */
    public function getDriverName()
    {
        return 'symfony2';
    }

    /**
     * {@inheritdoc}
     */
    public function supportsJavascript()
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function configure(ArrayNodeDefinition $builder)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function buildDriver(array $config)
    {
        if (!class_exists('Behat\Mink\Driver\BrowserKitDriver')) {
            throw new \RuntimeException(
                'Install MinkBrowserKitDriver in order to use the symfony2 driver.'
            );
        }

        return new Definition('Behat\ZF2Extension\Driver\KernelDriver', array(
            new Reference(ZF2Extension::KERNEL_ID),
            '%mink.base_url%',
        ));
    }
}
