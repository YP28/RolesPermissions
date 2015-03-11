<?php namespace RolesPermissions\Services;

use RolesPermissions\Interfaces\RoleInterface;
use RolesPermissions\Mappers\RoleMapper;
use RolesPermissions\Models\Permission;
use RolesPermissions\Models\Role;

class RoleService
{

    /**
     * @var RoleMapper
     */
    protected $roleMapper;

    /**
     * @param RoleMapper $roleMapper
     */
    public function __construct(RoleMapper $roleMapper)
    {
        $this->roleMapper = $roleMapper;
    }

    /**
     * @param string $name
     * @return Role
     */
    public function findByName($name)
    {
        return $this->roleMapper->findByName($name);
    }

    /**
     * @param Permission $permission
     * @return array|Role
     */
    public function findByPermission(Permission $permission)
    {
        return $this->roleMapper->findByPermission($permission);
    }

    /**
     * @param RoleInterface $roleable
     * @return array|Role
     */
    public function findByRoleable(RoleInterface $roleable)
    {
        return $this->roleMapper->findByRoleable($roleable);
    }

}