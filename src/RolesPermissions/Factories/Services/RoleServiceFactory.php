<?php namespace RolesPermissions\Factories\Services;

use RolesPermissions\Services\RoleService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RoleServiceFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return RoleService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new RoleService(
            $serviceLocator->get('RoleMapper')
        );
    }

}