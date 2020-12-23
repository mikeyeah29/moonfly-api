<?php

namespace App\Lib\Roles;

class UserRole {

    const ROLE_SUBSCRIBER = 'ROLE_SUBSCRIBER';
    const ROLE_EDITOR = 'ROLE_EDITOR';
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_DEV = 'ROLE_DEV';
    const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';

    /**
     * @var array
     */
    protected static $roleHierarchy = [
        self::ROLE_SUPER_ADMIN => ['*'],
        self::ROLE_ADMIN => [
            self::ROLE_EDITOR,
            self::ROLE_SUBSCRIBER,
            self::ROLE_DEV
        ],
        self::ROLE_EDITOR => [
            self::ROLE_SUBSCRIBER
        ],
        self::ROLE_DEV => [
            self::ROLE_SUBSCRIBER
        ],
        self::ROLE_SUBSCRIBER => []
    ];

    /**
     * @param string $role
     * @return array
     */
    public static function getAllowedRoles(string $role)
    {
        if (isset(self::$roleHierarchy[$role])) {
            return self::$roleHierarchy[$role];
        }

        return [];
    }

    /***
     * @return array
     */
    public static function getRoleList()
    {
        return [
            static::ROLE_SUBSCRIBER => 'Subscriber',
            static::ROLE_EDITOR => 'Editor',
            static::ROLE_DEV => 'Developer',
            static::ROLE_ADMIN =>'Admin',
            static::ROLE_SUPER_ADMIN => 'Super Admin',
        ];
    }

}