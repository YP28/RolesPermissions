<?php namespace RolesPermissions\Mappers;

use RolesPermissions\Models\Permission;
use RolesPermissions\Models\Role;
use Zend\Db\Sql\Sql;

class RoleMapper extends MySQLMapper
{

    /**
     * @var PermissionMapper
     */
    protected $permissionMapper;

    /**
     * @param PermissionMapper $permissionMapper
     */
    public function setPermissionMapper(PermissionMapper $permissionMapper)
    {
        $this->permissionMapper = $permissionMapper;
    }

    /**
     * @param string $name
     * @return Role
     */
    public function findByName($name)
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select(Role::$table)->where(array('name = ?' => $name));

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if(($roleRow = $result->current()))
        {
            $role = new Role();
            $role->setId($roleRow['id']);
            $role->setName($roleRow['name']);
            $role->setPermissions(
                $this->permissionMapper->findByRole($role)
            );

            return $role;
        }
        return null;
    }

    /**
     * @param Permission $permission
     * @return array|Role
     */
    public function findByPermission(Permission $permission)
    {
        // TODO: Implement findByPermission() method
    }

    /**
     * @param string $roleable_type
     * @param integer $roleable_id
     * @return array|Role
     */
    public function findByRoleable($roleable_type, $roleable_id)
    {
        // TODO: Implement findByRoleable() method
    }

}