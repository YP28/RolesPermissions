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

        $reflectionProperty = new \ReflectionProperty($permissionController, 'permissionMapper');
        $reflectionProperty->setAccessible(true);

        $this->assertInstanceOf('RolesPermissions\Mappers\PermissionMapper', $reflectionProperty->getValue($permissionController));
    }
}
