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
        $callbackRoute = $this->params()->fromPost('callbackRoute');

        $this->permissionMapper->add($this->params());

        $this->redirect()->toRoute($callbackRoute);
    }

    /**
     * Catches post request to edit Permission
     */
    public function updateAction()
    {
        $callbackRoute = $this->params()->fromPost('callbackRoute');
        $permissionId = $this->params()->fromPost('permission_id');

        $this->permissionMapper->update($permissionId, $this->params());

        $this->redirect()->toRoute($callbackRoute);
    }

    /**
     * Catches post request to delete Permission
     */
    public function deleteAction()
    {
        $callbackRoute = $this->params()->fromPost('callbackRoute');
        $permissionId = $this->params()->fromPost('permission_id');

        $this->permissionMapper->delete($permissionId);

        $this->redirect()->toRoute($callbackRoute);
    }

}