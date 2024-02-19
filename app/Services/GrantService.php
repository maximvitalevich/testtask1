<?php

namespace App\Services;

class GrantService
{

    public function validate(string $requestString, string $sig): bool
    {
        return mb_strtolower(md5($requestString), 'UTF-8') === $sig;
    }
}
