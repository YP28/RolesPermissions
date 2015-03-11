<?php namespace RolesPermissions\Interfaces;

use RolesPermissions\Mappers\RoleMapper;

interface RoleMapperInterface
{
    /**
     * @param RoleMapper $roleMapper
     * @return void
     */
    public function setRoleMapper(RoleMapper $roleMapper);
}