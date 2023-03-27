<?php

namespace App\Services;

/**
 * Summary of UserService
 */

interface UserService
{
    function login(string $user, string $password) : bool;

}
