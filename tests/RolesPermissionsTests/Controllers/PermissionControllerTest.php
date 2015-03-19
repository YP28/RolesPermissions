<?php namespace RolesPermissionsTests\Controllers;

use PHPUnit_Framework_TestCase;
use RolesPermissions\Controllers\PermissionController;

class PermissionControllerTest extends PHPUnit_Framework_TestCase
{

    public function testTest()
    {
        $mPermissionMapper = $this->getMock('\RolesPermissions\Mappers\PermissionMapper');
        $pc = new PermissionController($mPermissionMapper);
        $this->assertInstanceOf('PermissionController', $pc);
    }

}
