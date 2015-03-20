<?php namespace RolesPermissions\Controllers;

use RolesPermissions\Interfaces\RoleInterface;
use RolesPermissions\Mappers\RelationshipMapper;
use Zend\Mvc\Controller\AbstractActionController;

class RelationshipController extends AbstractActionController
{
    /**
     * @var RelationshipMapper
     */
    protected $relationshipMapper;

    /**
     * @param RelationshipMapper $relationshipMapper
     */
    public function __construct(RelationshipMapper $relationshipMapper)
    {
        $this->relationshipMapper = $relationshipMapper;
    }

    /**
     * @param RoleInterface $roleable
     * @param Role          $role
     *
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function addRoleToRoleable(RoleInterface $roleable, Role $role)
    {
        return $this->relationshipMapper->addRoleToRoleable($roleable, $role);
    }

    /**
     * @param RoleInterface $roleable
     * @param Role          $role
     *
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function deleteRoleFromRoleable(RoleInterface $roleable, Role $role)
    {
        return $this->relationshipMapper->deleteRoleFromRoleable($roleable, $role);
    }
}
