<?php namespace RolesPermissions\Services;

use RolesPermissions\Mappers\RoleMapper;
use RolesPermissions\Models\Permission;

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
     * @return \RolesPermissions\Models\Role
     */
    public function findByName($name)
    {
        return $this->roleMapper->findByName($name);
    }

    /**
     * @param Permission $permission
     * @return array|\RolesPermissions\Models\Role
     */
    public function findByPermission(Permission $permission)
    {
        return $this->roleMapper->findByPermission($permission);
    }

    /**
     * @param $roleable_type
     * @param $roleable_id
     * @return array|\RolesPermissions\Models\Role
     */
    public function findByRoleable($roleable_type, $roleable_id)
    {
        return $this->roleMapper->findByRoleable($roleable_type, $roleable_id);
    }

}