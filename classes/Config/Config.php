<?php

namespace Devq\Config;

/**
 * Class Config
 * @package Devq\Config
 */
class Config implements \ArrayAccess
{
    /**
     * @var array
     */
    private $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset,$this->data);
    }

    /**
     * @param mixed $offset
     * @return mixed
     * @throws ConfigException
     */
    public function offsetGet($offset)
    {
        if (!$this->offsetExists($offset)) {
            throw new ConfigException();
        }

        return $this->data[$offset];
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @throws ConfigException
     */
    public function offsetSet($offset, $value)
    {
        throw new ConfigException("Config is immutable");
    }

    /**
     * @param mixed $offset
     * @throws ConfigException
     */
    public function offsetUnset($offset)
    {
        throw new ConfigException("Config is immutable");
    }

}
