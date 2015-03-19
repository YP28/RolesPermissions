<?php namespace RolesPermissions\Mappers;

use Zend\Db\Adapter\AdapterInterface;

abstract class MySQLMapper
{
    /**
     * @var AdapterInterface
     */
    protected $dbAdapter;

    /**
     * @param AdapterInterface $dbAdapter
     */
    public function __construct(AdapterInterface $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }
}
