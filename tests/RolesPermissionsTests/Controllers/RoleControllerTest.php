<?php namespace RolesPermissionsTests\Controllers;

use PHPUnit_Framework_TestCase;
use RolesPermissions\Controllers\RoleController;
use Mockery as m;

class RoleControllerTest extends PHPUnit_Framework_TestCase
{

    /**
     * Tests if RoleController dependency is set correctly
     */
    public function testConstructorDependencyInjection()
    {
        $roleMapperStub = m::mock('\RolesPermissions\Mappers\RoleMapper');
        $roleController = new RoleController($roleMapperStub);

        $reflectionProperty = new \ReflectionProperty($roleController, 'roleMapper');
        $reflectionProperty->setAccessible(true);

        $this->assertInstanceOf('RolesPermissions\Mappers\RoleMapper', $reflectionProperty->getValue($roleController));
    }
    
}
