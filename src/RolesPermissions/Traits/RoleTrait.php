<?php namespace RolesPermissions\Traits;

use RolesPermissions\Models\Role;

trait RoleTrait
{

    /**
     * @var array|Role
     */
    protected $roles;

    /**
     * @return string
     */
    public function getModelType()
    {
        return __CLASS__;
    }

    /**
     * @param Role $role
     * @return void
     */
    public function addRole(Role $role)
    {
        $this->roles[$role->getName()] = $role;
    }

    public function setRoles(array $roles)
    {
        foreach($roles as $role)
            if($role instanceof Role)
                $this->addRole($role);
    }

    /**
     * @param string $role
     * @return boolean
     */
    public function hasRole($role)
    {
        if(isset($this->roles[$role])) return true;
        return false;
    }

    /**
     * @param array $permission
     * @return boolean
     */
    public function hasPermission(array $permission)
    {
        foreach($this->roles as $role)
            if($role->hasPermission($permission)) return true;
        return false;
    }

}