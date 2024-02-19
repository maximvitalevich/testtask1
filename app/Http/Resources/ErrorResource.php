<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ErrorResource
 *
 * Response data if error grant
 *
 * @package App\Http\Resources
 */
class ErrorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'error' => 'Ошибка авторизации в приложении',
            'error_key' => 'signature error',
        ];
    }
}
