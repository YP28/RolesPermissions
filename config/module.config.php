<?php return array(
    'service_manager' => array(
        'factories' => array(
            /*
             * Mappers
             */
            'RoleMapper'                    => 'RolesPermissions\Factories\Mappers\RoleMapperFactory',
            'PermissionMapper'              => 'RolesPermissions\Factories\Mappers\PermissionMapperFactory',
        )
    )
);