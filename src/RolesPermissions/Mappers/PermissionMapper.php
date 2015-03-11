<?php namespace RolesPermissions\Mappers;

use RolesPermissions\Models\Permission;
use RolesPermissions\Models\Role;

class PermissionMapper extends MySQLMapper
{

    /**
     * @param string $name
     * @return Permission
     */
    public function findByName($name)
    {
        // TODO: Implement findByName() method
    }

    /**
     * @param Role $role
     * @return array|Permission
     */
    public function findByRole(Role $role)
    {
        // TODO: Implement findByRole() method
    }

}