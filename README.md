# RolesPermissions
Roles and Permissions module for Zend Framework 2.

## Usage

### Check permissions and roles
```php
/**
 * Example: Check if $roleableInstance has permission to edit users
 * @returns boolean
 */
$roleableInstance->hasPermission(array('users' => 'edit'));

/**
 * Example: Check if $roleableInstance has the role "Administrator"
 * @returns boolean
 */
$roleableInstance->hasRole('Administrator');
```

### Modify Role and Permission objects
There are several routes to manage Role and Permission objects, these are all post routes and require a callbackRoute parameter to specify the route the application should return to.

##### Routes for Role
```
/rolespermissions/roles/add
POST - requires following parameters:
    callbackRoute - string, Zend Route to return to after handling the post
    role_name - string, the name of the new Role

/rolespermissions/roles/udpate
POST - requires following parameters:
    callbackRoute - string, Zend Route to return to after handling the post
    role_id - integer, the ID of the Role to be modified
    role_name - string, the new name of the Role

/rolespermissions/roles/delete
POST - requires following parameters:
    callbackRoute - string, Zend Route to return to after handling the post
    role_id - integer, the ID of the Role to be deleted
```
##### Routes for Permission
```
/rolespermissions/permissions/add
POST - requires following parameters:
    callbackRoute - string, Zend Route to return to after handling the post
    permission_subject - string, subject of the new Permission (example: users or posts)
    permission_type - string, the type of the new Permission (example: add or delete)

/rolespermissions/permissions/udpate
POST - requires following parameters:
    callbackRoute - string, Zend Route to return to after handling the post
    permission_id - integer, the ID of the Permission to be modified
    permission_subject - string, subject of the Permission to be modified (example: users or posts)
    permission_type - string, the type of the Permission to be modified (example: add or delete)

/rolespermissions/permissions/delete
POST - requires following parameters:
    callbackRoute - string, Zend Route to return to after handling the post
    permission_id - integer, the ID of the Permission to be deleted
```

## Installation

### Clone repository
Go to your Zend Framework 2 module folder in your console, and execute:
```
git clone https://github.com/YP28/RolesPermissions
```

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

### Code modifications
#### Roleable model
```php
class User implements RoleInterface
{
    use RoleTrait;
    
    private $id;
    
    public function getId() 
    {
        return $this->id;
    }
}
```
#### Roleable model mapper
```php
class UserMapper implements RoleMapperInterface
{
    use RoleMapperTrait;
    
    public function mapperMethod()
    {
        ...Getting user here...
        $user->setRoles($this->roleMapper->findByRoleable($user));
        return $user;
    }
}
```
#### Roleable model mapper factory
```php
class UserMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $um = new UserMapper(...Initialize UserMapper instance here...);
        $um->setRoleMapper($serviceLocator->get('RoleMapper'));
        return $um;
    }
}
```

## Bugs or problems
If you're having problems implementing the module or found bugs in it, please open in issue in this repository so it will help others.

### Module
This module is created for Telefoonboek B.V. to simplify user permissions.