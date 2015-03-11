<?php return array(
    'service_manager' => array(
        'factories' => array(
            /*
             * Database adapter
             */
            'Zend\Db\Adapter\Adapter'       => 'Zend\Db\Adapter\AdapterServiceFactory',

            /*
             * Services
             */
            'RoleService'                   => 'RolesPermissions\Factories\Services\RoleServiceFactory',

            /*
             * Mappers
             */
            'RoleMapper'                    => 'RolesPermissions\Factories\Mappers\RoleMapperFactory',
            'PermissionMapper'              => 'RolesPermissions\Factories\Mappers\PermissionMapperFactory',
        )
    )
);