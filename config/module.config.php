<?php return array(
    'service_manager' => array(
        'factories' => array(
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