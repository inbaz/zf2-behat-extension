<?php

namespace Behat\Sf2DemoBundle\Features\Context;

use Behat\MinkExtension\Context\MinkContext;
use Behat\ZF2Extension\Context\KernelAwareContext;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\KernelInterface;

class WebContext extends MinkContext implements KernelAwareContext
{
    private $kernel;

    public function __construct(Session $session, $simpleParameter, $simpleArg)
    {
    }

    /**
     * Sets HttpKernel instance.
     * This method will be automatically called by ZF2Extension ContextInitializer.
     *
     * @param KernelInterface $kernel
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }
}
