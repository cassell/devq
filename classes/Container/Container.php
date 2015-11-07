<?php

namespace Devq\Container;

use Devq\Event\EventBus;
use Devq\Event\EventBusInterface;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Interop\Container\Exception\NotFoundException;
use League\Container\ReflectionContainer;

class Container implements ContainerInterface
{
    /**
     * @var \League\Container\Container
     */
    private $delegate;

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @throws NotFoundException  No entry was found for this identifier.
     * @throws ContainerException Error while retrieving the entry.
     *
     * @return mixed Entry.
     */
    public function get($id)
    {
        return  $this->delegate->get($id);
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return boolean
     */
    public function has($id)
    {
        $this->delegate->has($id);
    }


    public function __construct(array $config, \League\Container\Container $delegate)
    {
        $this->delegate = $delegate;

        // behave like version 1.0 of \League\Container\Container
        $this->delegate->delegate(new ReflectionContainer());

        // load services.yml
        $this->delegate->addServiceProvider(new ContainerConfigServiceProvider($config));

        $this->delegate->share(EventBusInterface::class,function(){
            /** @var EventBus $eventBus */
            $eventBus = $this->delegate->get(EventBus::class);
            $eventBus->setupServiceLocator($this);
            return $eventBus;
        });

    }

}
