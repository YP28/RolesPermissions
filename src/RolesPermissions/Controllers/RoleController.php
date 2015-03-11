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
        $callbackRoute = $this->params()->fromPost('callbackRoute');

        $this->roleMapper->add($this->params());

        $this->redirect()->toRoute($callbackRoute);
    }

    /**
     * Catches post request to edit Role
     */
    public function updateAction()
    {
        $callbackRoute = $this->params()->fromPost('callbackRoute');
        $roleId = $this->params()->fromPost('role_id');

        $this->roleMapper->update($roleId, $this->params());

        $this->redirect()->toRoute($callbackRoute);
    }

    /**
     * Catches post request to delete Role
     */
    public function deleteAction()
    {
        $callbackRoute = $this->params()->fromPost('callbackRoute');
        $roleId = $this->params()->fromPost('role_id');

        $this->roleMapper->delete($roleId);

        $this->redirect()->toRoute($callbackRoute);
    }

}