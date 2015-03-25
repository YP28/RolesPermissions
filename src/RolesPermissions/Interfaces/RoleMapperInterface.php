<?php namespace RolesPermissions\Interfaces;

use RolesPermissions\Mappers\RoleMapper;

interface RoleMapperInterface
{
    /**
     * @param RoleMapper $roleMapper
     */
    public function setRoleMapper(RoleMapper $roleMapper);
}
