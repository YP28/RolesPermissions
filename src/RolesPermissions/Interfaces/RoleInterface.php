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
     */
    public function addRole(Role $role);

    /**
     * @param string $role
     *
     * @return boolean
     */
    public function hasRole($role);

    /**
     * @param $subject
     * @param $type
     *
     * @return boolean
     */
    public function hasPermission($subject, $type);

    /**
     * @return array|Role
     */
    public function getRoles();
}
