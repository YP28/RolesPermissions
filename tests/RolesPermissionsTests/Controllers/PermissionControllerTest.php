<?php namespace RolesPermissionsTests\Controllers;

use PHPUnit_Framework_TestCase;
use Mockery as m;

use RolesPermissions\Factories\Controllers\PermissionControllerFactory;

class PermissionControllerTest extends PHPUnit_Framework_TestCase implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    public function testTest()
    {
        /*$mock = m::mock('\RolesPermissions\Mappers\PermissionMapper');
        $permissionController = new PermissionController($mock);

        $reflectionProperty = new \ReflectionProperty($permissionController, 'permissionMapper');
        $reflectionProperty->setAccessible(true);

        $this->assertInstanceOf('RolesPermissions\Mappers\PermissionMapper', $reflectionProperty->getValue($permissionController));*/

        $sl = m::mock('\Zend\ServiceManager\ServiceLocatorInterface');
        $permissionControllerFactory = new PermissionControllerFactory();
        $permissionController = $permissionControllerFactory->createService($sl);
        $this->assertInstanceOf('RolesPermissions\Controllers\PermissionController', $permissionController);
    }
}
