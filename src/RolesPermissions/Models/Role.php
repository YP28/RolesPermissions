<?php namespace RolesPermissions\Models;

/**
 * Class Role
 * @package RolesPermissions\Models
 *
 *
 * Database tables
 *
 * roles:
 * id - integer, auto_increment, primary_key
 * name - varchar(255)
 * UNIQUE: name
 *
 * roles_roleable:
 * id - integer, auto_increment, primary_key
 * role_id - integer
 * roleable_type - varchar(255)
 * roleable_id - integer
 * UNIQUE: (role_id, roleable_type, roleable_id)
 */

class Role
{
    /**
     * Database table for Role
     * @var string
     */
    public static $table = 'roles';

    /**
     * Database table for polymorpic to Roleable
     * @var string
     */
    public static $tableToRoleable = 'roles_roleable';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array|Permission
     */
    private $permissions = array();

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array|Permission
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param array|Permission $permissions
     */
    public function setPermissions(array $permissions)
    {
        foreach ($permissions as $permission) {
            if ($permission instanceof Permission) {
                $this->permissions[] = $permission;
            }
        }
    }

    /**
     * @param  string  $subject
     * @param  string  $type
     * @return boolean
     */
    public function hasPermission($subject, $type)
    {
        foreach ($this->permissions as $p) {
            if ($p->getSubject() == $subject && $p->getType() == $type) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
