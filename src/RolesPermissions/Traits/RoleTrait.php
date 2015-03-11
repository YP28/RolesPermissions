<?php namespace RolesPermissions\Traits;

use RolesPermissions\Models\Role;

trait RoleTrait
{

    /**
     * @var array|Role
     */
    protected $roles;

    /**
     * @param Role $role
     * @return void
     */
    public function addRole(Role $role)
    {
        // TODO: Implement addRole() method.
    }

    /**
     * @param string $role
     * @return boolean
     */
    public function hasRole($role)
    {
        // TODO: Implement hasRole() method.
    }

    /**
     * @param string $permission
     * @return boolean
     */
    public function hasPermission($permission)
    {
        // TODO: Implement hasPermission() method.
    }

}