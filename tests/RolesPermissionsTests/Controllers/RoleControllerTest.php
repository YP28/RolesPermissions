<?php namespace RolesPermissionsTests\Controllers;

use PHPUnit_Framework_TestCase;
use RolesPermissions\Controllers\RoleController;

class RoleControllerTest extends PHPUnit_Framework_TestCase
{
    public function testConstructorDependencyInjection()
    {
        $roleMapperStub = $this->getMockBuilder('RoleMapper')->getMock();
        $roleController = new RoleController($roleMapperStub);

        $reflectionProperty = new \ReflectionProperty($roleController, 'roleMapper');

        $this->assertInstanceOf('RolesPermissions\Mappers\RoleMapper', $reflectionProperty);
    }
}
