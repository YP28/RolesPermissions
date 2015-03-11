<?php namespace RolesPermissions\Interfaces;

use RolesPermissions\Models\Role;

interface RoleInterface
{

    /**
     * @return integer
     */
    public function getId();

    /**
     * @return string
     */
    public function getModelType();

    /**
     * @param Role $role
     * @return void
     */
    public function addRole(Role $role);

    /**
     * @param string $role
     * @return boolean
     */
    public function hasRole($role);

    /**
     * @param string $permission
     * @return boolean
     */
    public function hasPermission($permission);

}