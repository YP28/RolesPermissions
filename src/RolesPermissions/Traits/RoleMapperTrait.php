<?php namespace RolesPermissions\Traits;

use RolesPermissions\Mappers\RoleMapper;

trait RoleMapperTrait
{
    /**
     * @var RoleMapper
     */
    protected $roleMapper;

    /**
     * @param RoleMapper $roleMapper
     */
    public function setRoleMapper(RoleMapper $roleMapper)
    {
        $this->roleMapper = $roleMapper;
    }
}
