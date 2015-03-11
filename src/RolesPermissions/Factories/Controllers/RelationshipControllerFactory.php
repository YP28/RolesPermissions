<?php namespace RolesPermissions\Factories\Controllers;

use RolesPermissions\Controllers\RelationshipController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RelationshipControllerFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return RelationshipController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new RelationshipController(
            $serviceLocator->get('RelationshipMapper')
        );
    }

}