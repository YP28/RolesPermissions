<?php namespace RolesPermissions\Controllers;

use RolesPermissions\Mappers\RoleMapper;
use Zend\Mvc\Controller\AbstractActionController;

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
     *
     * Returns to callbackRoute:
     * \Zend\Db\Adapter\Driver\ResultInterface $result
     * \Zend\Stdlib\Parameters $params
     */
    public function addAction()
    {
        $callbackRoute = $this->params()->fromPost('callbackRoute');

        $result = $this->roleMapper->add($this->params());

        $this->redirect()->toRoute($callbackRoute, array(
            'result' => $result,
            'params' => $this->params(),
        ));
    }

    /**
     * Catches post request to edit Role
     *
     * Returns to callbackRoute:
     * \Zend\Db\Adapter\Driver\ResultInterface $result
     * \Zend\Stdlib\Parameters $params
     */
    public function updateAction()
    {
        $callbackRoute = $this->params()->fromPost('callbackRoute');
        $roleId = $this->params()->fromPost('role_id');

        $result = $this->roleMapper->update($roleId, $this->params());

        $this->redirect()->toRoute($callbackRoute, array(
            'result' => $result,
            'params' => $this->params(),
        ));
    }

    /**
     * Catches post request to delete Role
     *
     * Returns to callbackRoute:
     * \Zend\Db\Adapter\Driver\ResultInterface $result
     * \Zend\Stdlib\Parameters $params
     */
    public function deleteAction()
    {
        $callbackRoute = $this->params()->fromPost('callbackRoute');
        $roleId = $this->params()->fromPost('role_id');

        $result = $this->roleMapper->delete($roleId);

        $this->redirect()->toRoute($callbackRoute, array(
            'result' => $result,
            'params' => $this->params(),
        ));
    }
}
