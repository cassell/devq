<?php
namespace Devq\Container;

use League\Container\Definition\ClassDefinition;
use League\Container\Definition\DefinitionInterface;
use League\Container\ServiceProvider\AbstractServiceProvider;

class ContainerConfigServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    private $containerConfig;

    /**
     * ContainerConfigServiceProvider constructor.
     * @param array $containerConfig
     */
    public function __construct($containerConfig)
    {
        $this->containerConfig = $containerConfig;
        $this->provides = array_keys($containerConfig);
    }

    /**
     * This is where the magic happens, within the method you can
     * access the container and register or retrieve anything
     * that you need to, but remember, every alias registered
     * within this method must be declared in the `$provides` array.
     */
    public function register()
    {
        foreach ($this->containerConfig as $className => $options) {
            $this->createDefinitionFromConfig($options,$className);
        }
    }

    /**
     * Resolves the concrete class
     *
     * @param  mixed $concrete
     * @return mixed
     */
    protected function resolveConcreteClassFromConfig($concrete)
    {
        if (is_array($concrete)) {
            if (array_key_exists('definition', $concrete)) {
                $concrete = $concrete['definition'];
            } elseif (array_key_exists('class', $concrete)) {
                $concrete = $concrete['class'];
            }
        }

        // if the concrete doesn't have a class associated with it then it
        // must be either a Closure or arbitrary type so we just bind that
        return $concrete;
    }

    /**
     * Create a definition from a config entry
     *
     * @param  mixed  $options
     * @param  string $alias
     * @return void
     */
    protected function createDefinitionFromConfig($options, $alias)
    {
        $singleton = false;
        $arguments = [];
        $methods   = [];

        if (is_array($options)) {
            $singleton = (! empty($options['singleton']));
            $arguments = (array_key_exists('arguments', $options)) ? (array) $options['arguments'] : [];
            $methods   = (array_key_exists('methods', $options)) ? (array) $options['methods'] : [];
        }

        $concrete  = $this->resolveConcreteClassFromConfig($options);

        // define in the container, with constructor arguments and method calls
        $definition = $this->getContainer()->add($alias, $concrete, $singleton);

        if ($definition instanceof DefinitionInterface) {
            $definition->withArguments($arguments);
        }

        if ($definition instanceof ClassDefinition) {
            $definition->withMethodCalls($methods);
        }
    }

}
