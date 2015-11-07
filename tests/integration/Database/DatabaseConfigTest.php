<?php

class DatabaseConfigTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testDatabaseConfiguration()
    {
        $container = $this->getContainer();
        $conn = $container->get(Devq\Database\DatabaseInterface::class);

        $res = $conn->fetchFirstRow('select system_value from system_key_value where system_key = ?',[1]);
        $this->assertEquals('devq',$res['system_value']);
    }

    private function getContainer()
    {
        return require_once __DIR__ . "/../../../container/bootstrap.php";
    }

}
