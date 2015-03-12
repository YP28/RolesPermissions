<?php namespace RolesPermissions\Mappers;

use RolesPermissions\Models\Permission;
use RolesPermissions\Models\Role;
use Zend\Db\Sql\Sql;

class PermissionMapper extends MySQLMapper
{

    /**
     * @param string $name
     * @return Permission
     */
    public function findByName($name)
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select(Permission::$table)
            ->where(array('name = ?', $name));

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if(($permissionRow = $result->current()))
        {
            $permission = new Permission();
            $permission->setId($permissionRow['id']);
            $permission->setSubject($permissionRow['subject']);
            $permission->setType($permission['type']);

            return $permission;
        }
        return null;
    }

    /**
     * @param Role $role
     * @return array|Permission
     */
    public function findByRole(Role $role)
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select(array('p' => Permission::$table))
            ->join(array('pr' => Permission::$tableToRoles), 'p.id = pr.permission_id', array())
            ->join(array('r' => Role::$table), 'pr.role_id = r.id', array())
            ->where(array('r.id = ?' => $role->getId()));

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        $return = array();
        foreach($result as $permissionRow)
        {
            $tmpPermission = new Permission();
            $tmpPermission->setId($permissionRow['id']);
            $tmpPermission->setSubject($permissionRow['subject']);
            $tmpPermission->setType($permissionRow['type']);

            $return[] = $tmpPermission;
        }

        return $return;
    }

    /**
     * @param $params
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function add($params)
    {
        $sql = new Sql($this->dbAdapter);
        $add = $sql->insert(Permission::$table)
            ->columns(array(
                'subject',
                'type',
            ))
            ->values(array(
                $params->fromPost('permission_subject'),
                $params->fromPost('permission_type'),
            ));

        $stmt = $sql->prepareStatementForSqlObject($add);
        return $stmt->execute();
    }

    /**
     * @param $permission_id
     * @param $params
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function update($permission_id, $params)
    {
        $sql = new Sql($this->dbAdapter);
        $update = $sql->update(Permission::$table)->set(array(
            'subject' => $params->fromPost('permission_subject'),
            'type' => $params->fromPost('permission_type')
        ))->where(array(
            'id' => $permission_id
        ));

        $stmt = $sql->prepareStatementForSqlObject($update);
        return $stmt->execute();
    }

    /**
     * @param $permission_id
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function delete($permission_id)
    {
        $sql = new Sql($this->dbAdapter);
        $update = $sql->delete(Permission::$table)
            ->where(array('id' => $permission_id));

        $stmt = $sql->prepareStatementForSqlObject($update);
        return $stmt->execute();
    }

}