<?php return array(
    'service_manager' => array(
        'factories' => array(
            /*
             * Mappers
             */
            'RoleMapper'                    => 'RolesPermissions\Factories\Mappers\RoleMapperFactory',
            'PermissionMapper'              => 'RolesPermissions\Factories\Mappers\PermissionMapperFactory',
        )
    ),
    'controllers' => array(
        'factories' => array(
            'RoleController'                => 'RolesPermissions\Factories\Controllers\RoleControllerFactory',
            'PermissionController'          => 'RolesPermissions\Factories\Controllers\PermissionControllerFactory'
        )
    ),
    'router' => array(
        'routes' => array(
            'rolespermissions' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/rolespermissions',
                ),
                'may_terminate' => false,
                'child_routes' => array(
                    'roles' => array(
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => array(
                            'route' => '/roles',
                        ),
                        'may_terminate' => false,
                        'child_routes' => array(
                            'add' => array(
                                'type' => 'Zend\Mvc\Router\Http\Method',
                                'options' => array(
                                    'verb' => 'post',
                                    'route' => '/add',
                                    'defaults' => array(
                                        'controller' => 'RoleController',
                                        'action' => 'add'
                                    ),
                                ),
                            ),
                            'edit' => array(
                                'type' => 'Zend\Mvc\Router\Http\Method',
                                'options' => array(
                                    'verb' => 'post',
                                    'route' => '/update',
                                    'defaults' => array(
                                        'controller' => 'RoleController',
                                        'action' => 'update'
                                    ),
                                ),
                            ),
                            'delete' => array(
                                'type' => 'Zend\Mvc\Router\Http\Method',
                                'options' => array(
                                    'verb' => 'post',
                                    'route' => '/edit',
                                    'defaults' => array(
                                        'controller' => 'RoleController',
                                        'action' => 'delete'
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'permissions' => array(
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => array(
                            'route' => '/permissions',
                        ),
                        'may_terminate' => false,
                        'child_routes' => array(
                            'add' => array(
                                'type' => 'Zend\Mvc\Router\Http\Method',
                                'options' => array(
                                    'verb' => 'post',
                                    'route' => '/add',
                                    'defaults' => array(
                                        'controller' => 'PermissionController',
                                        'action' => 'add'
                                    ),
                                ),
                            ),
                            'edit' => array(
                                'type' => 'Zend\Mvc\Router\Http\Method',
                                'options' => array(
                                    'verb' => 'post',
                                    'route' => '/update',
                                    'defaults' => array(
                                        'controller' => 'PermissionController',
                                        'action' => 'update'
                                    ),
                                ),
                            ),
                            'delete' => array(
                                'type' => 'Zend\Mvc\Router\Http\Method',
                                'options' => array(
                                    'verb' => 'post',
                                    'route' => '/delete',
                                    'defaults' => array(
                                        'controller' => 'PermissionController',
                                        'action' => 'delete'
                                    ),
                                ),
                            ),
                        )
                    )
                )
            )
        )
    )
);