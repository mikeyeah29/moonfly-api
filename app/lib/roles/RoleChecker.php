<?php

namespace App\Lib\Roles;

use App\User;

/**
 * Class RoleChecker
 * @package App\Role
 */
class RoleChecker
{
    /**
     * @param User $user
     * @param string $role
     * @return bool
     */
    public function check(User $user, string $role)
    {
        if(!$user->roles) {
            return false;
        }

        // Super Admin has everything
        if ($user->hasRole(UserRole::ROLE_SUPER_ADMIN)) {
            return true;
        }

        if (in_array($role, UserRole::getAllowedRoles($role))) {
            return true;
        }

        return $user->hasRole($role);
    }
}