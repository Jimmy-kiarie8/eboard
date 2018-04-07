<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Permission;
use App\Traits\ExposePermissions;
// use App\User_role;

class Admin extends Authenticatable
{
    // use HasRoles;
    use Notifiable;
    use \Illuminate\Auth\Authenticatable;

    public function role()
    {
        return $this->belongsToMany(Role::class,'admin_roles');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','verifyToken'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}


/*'admin_roles.user_role_id' in 'field list' (SQ
L: select `user_roles`.*, `admin_roles`.`admin_id` as `pivot_admin_id`, `admin_r
oles`.`user_role_id` as `pivot_user_role_id` from `user_roles` inner join `admin
_roles` on `user_roles`.`id` = `admin_roles`.`user_role_id` where `admin_roles`.
`admin_id` = 1)'*/