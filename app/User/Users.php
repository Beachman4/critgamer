<?php
/**
 * Created by PhpStorm.
 * User: Aylon
 * Date: 7/8/2016
 * Time: 6:19 PM
 */

namespace App;


use Illuminate\Support\Facades\Facade;

class Users extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "Users";
    }
}