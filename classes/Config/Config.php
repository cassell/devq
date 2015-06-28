<?php

namespace Devq\Config;

/**
 * Class Connection
 * @package Devq\Database
 */
class Config implements \ArrayAccess
{
    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset,$this->data);
    }

    public function offsetGet($offset)
    {
        if (!$this->offsetExists($offset)) {
            throw new ConfigException();
        }

        return $this->data[$offset];
    }

    public function offsetSet($offset, $value)
    {
        throw new ConfigException("Config is immutable");
    }

    public function offsetUnset($offset)
    {
        throw new ConfigException("Config is immutable");
    }

}
