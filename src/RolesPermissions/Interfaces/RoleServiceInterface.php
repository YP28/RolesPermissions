<?php namespace RolesPermissions\Interfaces;

use RolesPermissions\Services\RoleService;

interface RoleServiceInterface
{
    /**
     * @param RoleService $roleService
     * @return void
     */
    public function setRoleService(RoleService $roleService);
}