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
     * Catches post request to add Permission.
     *
     * Returns to callbackRoute:
     * \Zend\Db\Adapter\Driver\ResultInterface $result
     * \Zend\Stdlib\Parameters $params
     */
    public function addAction()
    {
        $callbackRoute = $this->params()->fromPost('callbackRoute');

        $result = $this->permissionMapper->add($this->params());

        $this->redirect()->toRoute($callbackRoute, [
            'result' => $result,
            'params' => $this->params(),
        ]);
    }

    /**
     * Catches post request to edit Permission.
     *
     * Returns to callbackRoute:
     * \Zend\Db\Adapter\Driver\ResultInterface $result
     * \Zend\Stdlib\Parameters $params
     */
    public function updateAction()
    {
        $callbackRoute = $this->params()->fromPost('callbackRoute');
        $permissionId = $this->params()->fromPost('permission_id');

        $result = $this->permissionMapper->update($permissionId, $this->params());

        $this->redirect()->toRoute($callbackRoute, [
            'result' => $result,
            'params' => $this->params(),
        ]);
    }

    /**
     * Catches post request to delete Permission.
     *
     * Returns to callbackRoute:
     * \Zend\Db\Adapter\Driver\ResultInterface $result
     * \Zend\Stdlib\Parameters $params
     */
    public function deleteAction()
    {
        $callbackRoute = $this->params()->fromPost('callbackRoute');
        $permissionId = $this->params()->fromPost('permission_id');

        $result = $this->permissionMapper->delete($permissionId);

        $this->redirect()->toRoute($callbackRoute, [
            'result' => $result,
            'params' => $this->params(),
        ]);
    }
}
