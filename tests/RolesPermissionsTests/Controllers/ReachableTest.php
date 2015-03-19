<?php namespace RolesPermissionsTest\Controllers;

use PHPUnit_Framework_TestCase;
use RolesPermissions\Controllers\PermissionController;

class PermissionControllerTest extends PHPUnit_Framework_TestCase
{

    public function testTestSuite()
    {
        $mPermissionMapper = $this->getMockBuilder('PermissionMapper')->getMock();
        $permissionController = new PermissionController($mPermissionMapper);

        $this->assertTrue(true);
    }

}