<?php

namespace App\Repositories;

use App\Interfaces\{
    ApiTokenRepositoryInterface,
    AuthRepositoryInterface
};
use App\Models\User;

class AuthRepository implements AuthRepositoryInterface
{
    private ApiTokenRepositoryInterface $apiTokenRepository;

    public function __construct(ApiTokenRepositoryInterface $apiTokenRepository) {
        $this->apiTokenRepository = $apiTokenRepository;
    }

    public function registerUser(array $userDetails): object
    {
        $user = User::create($userDetails);

        return $this->setToken($user);
    }

    public function setToken(object $user): object
    {
        $token = $this->apiTokenRepository->createObjectToken();
        $user->api_token()->save($token);
        return $user;
    }

    public function dropToken(object $user): void
    {
        $user->api_token()->delete();
    }
}
