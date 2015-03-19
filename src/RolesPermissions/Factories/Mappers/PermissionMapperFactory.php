<?php namespace RolesPermissions\Factories\Mappers;

use RolesPermissions\Mappers\PermissionMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PermissionMapperFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return PermissionMapper
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new PermissionMapper(
            $serviceLocator->get('Zend\Db\Adapter\Adapter')
        );
    }
}
