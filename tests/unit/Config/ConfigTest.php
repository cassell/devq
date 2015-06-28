<?php

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createConfig()
    {
        $config = new \Devq\Config\Config(['test' => 'yes']);
        $this->assertEquals('yes',$config['test']);
    }

    /**
     * @test
     * @expectedException \Devq\Config\ConfigException
     */
    public function immutableTest()
    {
        $config = new \Devq\Config\Config(['test' => 'yes']);
        $config['key'] = 1;
    }

}
