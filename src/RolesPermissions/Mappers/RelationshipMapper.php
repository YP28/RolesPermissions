<?php namespace RolesPermissions\Mappers;

use RolesPermissions\Interfaces\RoleInterface;
use RolesPermissions\Models\Role;
use Zend\Db\Sql\Sql;

class RelationshipMapper extends MySQLMapper
{
    /**
     * @param  RoleInterface                           $roleable
     * @param  Role                                    $role
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function addRoleToRoleable(RoleInterface $roleable, Role $role)
    {
        $sql = new Sql($this->dbAdapter);
        $insert = $sql->insert(Role::$tableToRoleable)
            ->columns(array(
                'role_id',
                'roleable_type',
                'roleable_id',
            ))
            ->values(array(
                $role->getId(),
                $roleable->getModelType(),
                $roleable->getId(),
            ));

        $stmt = $sql->prepareStatementForSqlObject($insert);

        return $stmt->execute();
    }

    /**
     * @param  RoleInterface                           $roleable
     * @param  Role                                    $role
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function deleteRoleFromRoleable(RoleInterface $roleable, Role $role)
    {
        $sql = new Sql($this->dbAdapter);
        $delete = $sql->delete(Role::$tableToRoleable)
            ->where(array(
                'role_id = ?' => $role->getId(),
                'roleable_type = ?' => $roleable->getModelType(),
                'roleable_id = ?' => $roleable->getId(),
            ));

        $stmt = $sql->prepareStatementForSqlObject($delete);

        return $stmt->execute();
    }
}
