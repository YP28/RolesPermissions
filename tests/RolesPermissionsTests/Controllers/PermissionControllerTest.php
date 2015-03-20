<?php namespace RolesPermissionsTests\Controllers;

use PHPUnit_Framework_TestCase;
use RolesPermissions\Controllers\PermissionController;
use Mockery as m;

class PermissionControllerTest extends PHPUnit_Framework_TestCase
{
    public function testTest()
    {
        $mock = m::mock('\RolesPermissions\Mappers\PermissionMapper');
        $permissionController = new PermissionController($mock);
        $this->assertInstanceOf('\RolesPermissions\Controllers\PermissionController', $permissionController);
    }
}
