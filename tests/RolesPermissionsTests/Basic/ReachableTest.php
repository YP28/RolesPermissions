<?php namespace RolesPermissionsTest\Basic;

use PHPUnit_Framework_TestCase;

class ReachableTest extends PHPUnit_Framework_TestCase
{

    public function testResponseCode()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->getCode());
    }

}