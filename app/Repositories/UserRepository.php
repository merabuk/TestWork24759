<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers(): object
    {
        return User::with('products')->get();
    }

    public function getUserById($userId): object
    {
        return User::with('products')->findOrFail($userId);
    }

    public function deleteUser($userId): void
    {
        User::destroy($userId);
    }

    public function createUser(array $userDetails): object
    {
        $userDetails['password'] = Hash::make($userDetails['password']);

        return User::create($userDetails);
    }

    public function updateUser($userId, array $newDetails)
    {
        $newDetails['password'] = Hash::make($newDetails['password']);

        return User::whereId($userId)->update($newDetails);
    }
}
