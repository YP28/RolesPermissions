<?php namespace RolesPermissionsTest\Basic;

use PHPUnit_Framework_TestCase;

class ReachableTest extends PHPUnit_Framework_TestCase
{

    public function testResponseCode()
    {
        $array = array();
        for($i = 0; $i < 500000; $i++) $array[] = $i;
        $this->assertEquals(500000, count($array));
    }

}