<?php namespace RolesPermissions\Factories\Mappers;

use RolesPermissions\Mappers\RoleMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RoleMapperFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return RoleMapper
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $rm = new RoleMapper($serviceLocator->get('Zend\Db\Adapter\Adapter'));
        $rm->setPermissionMapper($serviceLocator->get('PermissionMapper'));

        return $rm;
    }
}
