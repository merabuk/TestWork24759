<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function getAllUsers(): object;
    public function getUserById($userId): object;
    public function deleteUser($userId): void;
    public function createUser(array $userDetails): object;
    public function updateUser($userId, array $newDetails);
}
