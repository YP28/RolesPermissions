<?php namespace RolesPermissions\Controllers;

use RolesPermissions\Mappers\PermissionMapper;
use Zend\Mvc\Controller\AbstractActionController;

class PermissionController extends AbstractActionController
{

    /**
     * @var PermissionMapper
     */
    protected $permissionMapper;

    /**
     * @param PermissionMapper $permissionMapper
     */
    public function __construct(PermissionMapper $permissionMapper)
    {
        $this->permissionMapper = $permissionMapper;
    }

    /**
     * Catches post request to add Permission
     */
    public function addAction()
    {
        // TODO: Implement addAction() method
    }

    /**
     * Catches post request to edit Permission
     */
    public function editAction()
    {
        // TODO: Implement editAction() method
    }

    /**
     * Catches post request to delete Permission
     */
    public function deleteAction()
    {
        // TODO: Implement deleteAction() method
    }

}