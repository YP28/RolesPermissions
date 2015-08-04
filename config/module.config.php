<?php return [
    'service_manager' => [
        'factories' => [
            /*
             * Mappers
             */
            'RoleMapper'                    => 'RolesPermissions\Factories\Mappers\RoleMapperFactory',
            'PermissionMapper'              => 'RolesPermissions\Factories\Mappers\PermissionMapperFactory',
            'RelationshipMapper'            => 'RolesPermissions\Factories\Mappers\RelationshipMapperFactory',

            /*
             * Controllers (as a service)
             */
            'RelationshipController'        => 'RolesPermissions\Factories\Controllers\RelationshipControllerFactory',
        ],
    ],
    'controllers' => [
        'factories' => [
            'RoleController'                => 'RolesPermissions\Factories\Controllers\RoleControllerFactory',
            'PermissionController'          => 'RolesPermissions\Factories\Controllers\PermissionControllerFactory',
        ],
    ],
    'router' => [
        'routes' => [
            'rolespermissions' => [
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => [
                    'route' => '/rolespermissions',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'roles' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/roles',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'add' => [
                                'type' => 'Zend\Mvc\Router\Http\Method',
                                'options' => [
                                    'verb' => 'post',
                                    'route' => '/add',
                                    'defaults' => [
                                        'controller' => 'RoleController',
                                        'action' => 'add',
                                    ],
                                ],
                            ],
                            'edit' => [
                                'type' => 'Zend\Mvc\Router\Http\Method',
                                'options' => [
                                    'verb' => 'post',
                                    'route' => '/update',
                                    'defaults' => [
                                        'controller' => 'RoleController',
                                        'action' => 'update',
                                    ],
                                ],
                            ],
                            'delete' => [
                                'type' => 'Zend\Mvc\Router\Http\Method',
                                'options' => [
                                    'verb' => 'post',
                                    'route' => '/edit',
                                    'defaults' => [
                                        'controller' => 'RoleController',
                                        'action' => 'delete',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'permissions' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/permissions',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'add' => [
                                'type' => 'Zend\Mvc\Router\Http\Method',
                                'options' => [
                                    'verb' => 'post',
                                    'route' => '/add',
                                    'defaults' => [
                                        'controller' => 'PermissionController',
                                        'action' => 'add',
                                    ],
                                ],
                            ],
                            'edit' => [
                                'type' => 'Zend\Mvc\Router\Http\Method',
                                'options' => [
                                    'verb' => 'post',
                                    'route' => '/update',
                                    'defaults' => [
                                        'controller' => 'PermissionController',
                                        'action' => 'update',
                                    ],
                                ],
                            ],
                            'delete' => [
                                'type' => 'Zend\Mvc\Router\Http\Method',
                                'options' => [
                                    'verb' => 'post',
                                    'route' => '/delete',
                                    'defaults' => [
                                        'controller' => 'PermissionController',
                                        'action' => 'delete',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
