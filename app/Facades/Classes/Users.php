<?php
/**
 * Created by PhpStorm.
 * User: beach
 * Date: 2/1/2016
 * Time: 10:46 PM
 */
namespace App\Facades\Classes;
use Session;
use App\User;
class Users
{
    private static $session_id = 'user_id';
    public static function signUserIn($user_id)
    {
        return Session::put(self::$session_id, $user_id);
    }
    public static function signOut()
    {
        return Session::forget(self::$session_id);
    }
    public static function userExist()
    {
        if (User::find(session()->get(self::$session_id))) {
            return true;
        } else {
            session()->forget(self::$session_id);
            return false;
        }
    }
    public static function isSignedIn()
    {
        if (session()->has(self::$session_id)) {
            /*if (self::userExist()) {
                return true;
            }
            return false;*/
            return true;
        }
        return false;
    }
    public static function isAdmin()
    {
        if (self::isSignedIn()) {
            $user = self::Get();
            /*if ($user && $user->admin == 1) {
                return true;
            }
            return false;*/
            if ($user->admin_ips == 'ALL') {
                if ($user->admin == 1) {
                    return true;
                }
                return false;
            }
            $filtered = str_replace(' ', '', $user->admin_ips);
            $ips = explode(',', $filtered);
            if (in_array($_SERVER['REMOTE_ADDR'], $ips)) {
                if ($user->admin == 1) {
                    return true;
                }
                return false;
            }
            return false;
        }
        return false;
    }
    public static function Get()
    {
        return User::find(Session::get(self::$session_id));
    }
}