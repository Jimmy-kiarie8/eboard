<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions()
	{
	    return [
	        'view_users',
	        'add_users',
	        'edit_users',
	        'delete_users',

	        'view_roles',
	        'add_roles',
	        'edit_roles',
	        'delete_roles',

	        'view_shareholders',
	        'add_shareholders',
	        'edit_shareholders',
	        'delete_shareholders',

	        'view_directors',
	        'add_directors',
	        'edit_directors',
	        'delete_directors',

	        'view_employees',
	        'add_employees',
	        'edit_employees',
	        'delete_employees',

	    ];
	}
}
