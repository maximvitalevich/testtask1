<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'first_name', 'last_name', 'city', 'country'
    ];

    public function token(): HasOne
    {
        return $this->hasOne(UsersSession::class, 'user_id');
    }
}
