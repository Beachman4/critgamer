<?php
/**
 * Created by PhpStorm.
 * User: Aylon
 * Date: 7/8/2016
 * Time: 6:18 PM
 */

namespace App;

class UsersClass
{
    private static $session = "user_id";

    public static function isSignedIn()
    {
        return session()->has(self::$session);
    }
}