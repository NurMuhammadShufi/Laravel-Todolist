<?php

namespace App\Services\Impl;

use App\Services\UserService;

class UserServiceImpl implements UserService
{

    private array $users = [
        "Shufi" => "12345"
    ];

    /**
     * @param string $user
     * @param string $password
     * @return bool
     */
    function login(string $user, string $password) : bool
    {
        if (! isset($this->users[$user])) {
            return false;
        }

        $correctPassword = $this->users[$user];
        return $password == $correctPassword;
    }
}
