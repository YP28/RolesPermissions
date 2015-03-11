<?php namespace RolesPermissions\Traits;

use RolesPermissions\Services\RoleService;

trait RoleServiceTrait
{

    /**
     * @var RoleService
     */
    protected $roleService;

    /**
     * @param RoleService $roleService
     */
    public function setRoleService(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

}