<?php namespace RolesPermissionsTests\Controllers;

use PHPUnit_Framework_TestCase;

class PermissionControllerTest extends PHPUnit_Framework_TestCase
{

    public function testTest()
    {
        $mock = \Mockery::mock('\RolesPermissions\Mappers\PermissionMapper');
        $permissionController = new \RolesPermissions\Controllers\PermissionController($mock);
        $this->assertInstanceOf('\RolesPermissions\Controllers\PermissionController', $permissionController);
    }

}
