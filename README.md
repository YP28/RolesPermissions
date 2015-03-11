# RolesPermissions
Roles and Permissions module for Zend Framework 2.


## Installation

### Database structure
The database table configuration is also located in the model files:
./RolesPermissions/src/Models/Permission.php
./RolesPermissions/src/Models/Role.php

#### roles
```
id - integer, auto_increment, primary_key
name - varchar(255)
UNIQUE: name
```
#### roles_roleable
```
id - integer, auto_increment, primary_key
role_id - integer
roleable_type - varchar(255)
roleable_id - integer
UNIQUE: (role_id, roleable_type, roleable_id)
```
#### permissions
```
id - integer, auto_increment, primary_key
subject - varchar(255)
type - varchar(10)
UNIQUE: (subject, type)
```
#### roles_permissions
```
id - integer, auto_increment, primary_key
role_id - integer
permission_id - integer
UNIQUE: (role_id, permission_id)
```

### Prepare Roleable model
```php
class User implements RoleInterface
{
    use RoleTrait;
    
    private $id;
    
    public function getId() {}
}
```

#### Module
This module is created for Telefoonboek BV to simplify user permissions.