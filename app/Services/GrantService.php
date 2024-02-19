<?php

namespace App\Services;

/**
 * Class GrantService
 *
 * @package App\Services
 */
class GrantService
{
    /**
     * The data is validated according to the correspondence of the hash string of the specified format
     * to the signature received in the request data
     *
     * @param string $requestString
     * @param string $sig
     * @return bool
     */
    public function validate(string $requestString, string $sig): bool
    {
        return mb_strtolower(md5($requestString), 'UTF-8') === $sig;
    }
}
