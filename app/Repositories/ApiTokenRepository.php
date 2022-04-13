<?php

namespace App\Repositories;

use App\Interfaces\ApiTokenRepositoryInterface;
use App\Models\ApiToken;
use Illuminate\Support\Str;

class ApiTokenRepository implements ApiTokenRepositoryInterface
{

    public function getToken(): string
    {
        return Str::random(60);
    }

    public function createObjectToken(): object
    {
        $api_token = new ApiToken();
        $api_token->token = $this->getToken();
        return $api_token;
    }
}
