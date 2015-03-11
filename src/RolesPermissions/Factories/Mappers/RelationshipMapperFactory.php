<?php namespace RolesPermissions\Factories\Mappers;

use RolesPermissions\Mappers\RelationshipMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RelationshipMapperFactory implements FactoryInterface
{

    /**]
     * @param ServiceLocatorInterface $serviceLocator
     * @return RelationshipMapper
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new RelationshipMapper(
            $serviceLocator->get('Zend\Db\Adapter\Adapter')
        );
    }

}