<?php
namespace App\Traits;

use App\Models\Role;

trait HasRolesTrait {
    public function roles() {
        return $this->belongsToMany(Role::class,'roles_users');

    }
    public function hasRole($roles) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }
}