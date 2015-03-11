<?php namespace RolesPermissions\Factories\Controllers;

use RolesPermissions\Controllers\RoleController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RoleControllerFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return RoleController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new RoleController(
            $serviceLocator->getServiceLocator()->get('RoleMapper')
        );
    }

}