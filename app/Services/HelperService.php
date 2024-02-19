<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

/**
 * Class HelperService
 *
 * @package App\Services
 */
class HelperService
{

    /**
     * Converts request data into a string of the expected format
     *
     * @param Request $request
     * @return string
     */
    public static function requestToStr(Request $request): string
    {
        $input = $request->all(['id', 'access_token', 'first_name', 'last_name', 'city', 'country']);
        $output = "";

        ksort($input);

        foreach ($input as $key => $value) {
            $output .= sprintf('%s=%s', $key, $value);
        }

        $output .= Config::get('app.key');

        return $output;
    }
}
