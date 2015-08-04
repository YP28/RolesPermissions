<?php namespace RolesPermissions\Traits;

use RolesPermissions\Models\Role;

trait RoleTrait
{
    /**
     * @var array|Role
     */
    protected $roles = [];

    /**
     * @return string
     */
    public function getModelType()
    {
        return __CLASS__;
    }

    /**
     * @param Role $role
     * @return $this
     */
    public function addRole(Role $role)
    {
        $this->roles[$role->getName()] = $role;
        return $this;
    }

    /**
     * @param array|Role $roles
     * @return $this
     */
    public function setRoles(array $roles)
    {
        foreach ($roles as $role) {
            if ($role instanceof Role) {
                $this->addRole($role);
            }
        }
        return $this;
    }

    /**
     * @param string $role
     *
     * @return boolean
     */
    public function hasRole($role)
    {
        return (isset($this->roles[$role]));
    }

    /**
     * @param string $subject
     * @param string $type
     *
     * @return boolean
     */
    public function hasPermission($subject, $type)
    {
        foreach ($this->roles as $role) {
            if ($role->hasPermission($subject, $type)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array|Role
     */
    public function getRoles()
    {
        return $this->roles;
    }
}
