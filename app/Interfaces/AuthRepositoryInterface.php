<?php

namespace App\Interfaces;

interface AuthRepositoryInterface
{
    public function registerUser(array $userDetails): object;
    public function setToken(object $user): object;
    public function dropToken(object $user): void;
}
