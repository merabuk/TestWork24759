<?php

namespace App\Interfaces;

interface ApiTokenRepositoryInterface
{
    public function getToken(): string;
    public function createObjectToken(): object;
}
