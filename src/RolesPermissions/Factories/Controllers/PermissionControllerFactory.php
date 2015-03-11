<?php namespace RolesPermissions\Factories\Controllers;

use RolesPermissions\Controllers\PermissionController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PermissionControllerFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return PermissionController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new PermissionController(
            $serviceLocator->getServiceLocator()->get('PermissionMapper')
        );
    }

}