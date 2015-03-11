<?php namespace RolesPermissions\Mappers;

use RolesPermissions\Models\Permission;
use RolesPermissions\Models\Role;

class RoleMapper extends MySQLMapper
{

    /**
     * @param string $name
     * @return Role
     */
    public function findByName($name)
    {
        // TODO: Implement findByName() method
    }

    /**
     * @param Permission $permission
     * @return array|Role
     */
    public function findByPermission(Permission $permission)
    {
        // TODO: Implement findByPermission() method
    }

}