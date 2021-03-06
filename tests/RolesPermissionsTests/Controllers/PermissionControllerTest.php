<?php namespace RolesPermissionsTests\Controllers;

use PHPUnit_Framework_TestCase;
use Mockery as m;
use RolesPermissions\Controllers\PermissionController;


class PermissionControllerTest extends PHPUnit_Framework_TestCase
{
    public function testTest()
    {
        $mock = m::mock('\RolesPermissions\Mappers\PermissionMapper');
        $permissionController = new PermissionController($mock);

        $reflectionProperty = new \ReflectionProperty($permissionController, 'permissionMapper');
        $reflectionProperty->setAccessible(true);

        $this->assertInstanceOf('RolesPermissions\Mappers\PermissionMapper', $reflectionProperty->getValue($permissionController));
    }
}
