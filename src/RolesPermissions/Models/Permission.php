<?php namespace RolesPermissions\Models;

/**
 * Class Permission
 * @package RolesPermissions\Models
 *
 *
 * Database tables
 *
 * permissions:
 * id - integer, auto_increment, primary_key
 * subject - varchar(255)
 * type - varchar(10)
 * UNIQUE: (subject, type)
 *
 * roles_permissions:
 * id - integer, auto_increment, primary_key
 * role_id - integer
 * permission_id - integer
 * UNIQUE: (role_id, permission_id)
 */

class Permission
{
    /**
     * Database table for Permission
     * @var string
     */
    public static $table = 'permissions';

    /**
     * Database table for ManyToMany to Role
     * @var string
     */
    public static $tableToRoles = 'roles_permissions';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $type;

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
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
