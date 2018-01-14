<?php

namespace App\Facades;

use App\UserSessionSingleton;
use Illuminate\Support\Facades\Facade;

class UserSession extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserSessionSingleton::class;
    }
}