<?php namespace RolesPermissions\Mappers;

use RolesPermissions\Interfaces\RoleInterface;
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
     *
     * @return Role
     */
    public function findByName($name)
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select(Role::$table)
            ->where(['name = ?' => $name]);

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        if (($roleRow = $result->current())) {
            $role = new Role();
            $role->setId($roleRow['id']);
            $role->setName($roleRow['name']);
            $role->setPermissions(
                $this->permissionMapper->findByRole($role)
            );

            return $role;
        }

        return;
    }

    /**
     * @param Permission $permission
     *
     * @return array|Role
     */
    public function findByPermission(Permission $permission)
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select(['p' => Permission::$table])
            ->join(['pr' => Permission::$tableToRoles], 'p.id = pr.role_id', [])
            ->join(['r' => Role::$table], 'pr.permission_id = r.id', []);

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        $return = [];
        foreach ($result as $roleRow) {
            $tmpRole = new Role();
            $tmpRole->setId($roleRow['id']);
            $tmpRole->setName($roleRow['name']);
            $tmpRole->setPermissions($this->permissionMapper->findByRole($tmpRole));

            $return[] = $tmpRole;
        }

        return $return;
    }

    /**
     * @param RoleInterface $roleable
     *
     * @return array|Role
     */
    public function findByRoleable(RoleInterface $roleable)
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select(['r' => Role::$table])
            ->join(['rr' => Role::$tableToRoleable], 'r.id = rr.role_id', [])
            ->where([
                'rr.roleable_type = ?' => $roleable->getModelType(),
                'rr.roleable_id =?' => $roleable->getId(),
            ]);

        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        $return = [];
        foreach ($result as $roleRow) {
            $tmpRole = new Role();
            $tmpRole->setId($roleRow['id']);
            $tmpRole->setName($roleRow['name']);
            $tmpRole->setPermissions($this->permissionMapper->findByRole($tmpRole));

            $return[] = $tmpRole;
        }

        return $return;
    }

    /**
     * @return array|Role
     */
    public function findAll()
    {
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select(Role::$table);
        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();

        $return = [];
        foreach ($result as $roleRow) {
            $tmpRole = new Role();
            $tmpRole->setId($roleRow['id']);
            $tmpRole->setName($roleRow['name']);
            $tmpRole->setPermissions($this->permissionMapper->findByRole($tmpRole));

            $return[] = $tmpRole;
        }

        return $return;
    }

    /**
     * @param $params
     *
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function add($params)
    {
        $sql = new Sql($this->dbAdapter);
        $add = $sql->insert(Role::$table)
            ->columns([
                'name',
            ])
            ->values([
                $params->fromPost('role_name'),
            ]);

        $stmt = $sql->prepareStatementForSqlObject($add);

        return $stmt->execute();
    }

    /**
     * @param $role_id
     * @param $params
     *
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function update($role_id, $params)
    {
        $sql = new Sql($this->dbAdapter);
        $update = $sql->update(Role::$table)->set([
            'name' => $params->fromPost('role_name'),
        ])->where([
            'id = ?' => $role_id,
        ]);

        $stmt = $sql->prepareStatementForSqlObject($update);

        return $stmt->execute();
    }

    /**
     * @param integer $role_id
     *
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function delete($role_id)
    {
        $sql = new Sql($this->dbAdapter);
        $delete = $sql->delete(Role::$table)
            ->where(['id = ?' => $role_id]);

        $stmt = $sql->prepareStatementForSqlObject($delete);

        return $stmt->execute();
    }

    /**
     * @param $role_id
     * @param $permission_id
     *
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function addPermission($role_id, $permission_id)
    {
        $sql = new Sql($this->dbAdapter);
        $insert = $sql->insert(Permission::$tableToRoles)
            ->columns([
                'role_id',
                'permission_id',
            ])
            ->values([
                $role_id,
                $permission_id,
            ]);

        $stmt = $sql->prepareStatementForSqlObject($insert);

        return $stmt->execute();
    }

    /**
     * @param integer $role_id
     * @param integer $permission_id
     *
     * @return \Zend\Db\Adapter\Driver\ResultInterface
     */
    public function deletePermission($role_id, $permission_id)
    {
        $sql = new Sql($this->dbAdapter);
        $delete = $sql->delete(Permission::$tableToRoles)
            ->where([
                'role_id = ?' => $role_id,
                'permission_id = ?' => $permission_id,
            ]);

        $stmt = $sql->prepareStatementForSqlObject($delete);

        return $stmt->execute();
    }
}
