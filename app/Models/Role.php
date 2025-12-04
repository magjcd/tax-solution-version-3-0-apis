<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_name',
        'role_details',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'role_users');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }

    public function hasPermission($permission)
    {
        return $this->permissions->contain('permissions_name', $permission);
    }
}
