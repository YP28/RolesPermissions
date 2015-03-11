<?php namespace RolesPermissions\Controllers;

use RolesPermissions\Mappers\RoleMapper;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class RoleController extends AbstractActionController
{

    /**
     * @var RoleMapper
     */
    protected $roleMapper;

    /**
     * @param RoleMapper $roleMapper
     */
    public function __construct(RoleMapper $roleMapper)
    {
        $this->roleMapper = $roleMapper;
    }

    /**
     * Catches post request to add Role
     */
    public function addAction()
    {
        // TODO: Implement editAction() method
    }

    /**
     * Catches post request to edit Role
     */
    public function editAction()
    {
        // TODO: Implement editAction() method
    }

    /**
     * Catches post request to delete Role
     */
    public function deleteAction()
    {
        // TODO: Implement deleteAction() method
    }

}