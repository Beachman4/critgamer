<?php
/**
 * Created by PhpStorm.
 * User: beach
 * Date: 7/19/2016
 * Time: 12:53 AM
 */

namespace App\Facades\Classes;


class Admin
{
    private static $title;
    private static $subtitle;
    private static $buttons = [];
    private static $breadcrumbs = [];

    public static function title($title)
    {
        return self::$title = $title;
    }

    public static function getTitle()
    {
        return self::$title;
    }

    public static function subtitle($title)
    {
        return self::$subtitle = $title;
    }

    public static function getSubTitle()
    {
        return self::$subtitle;
    }

    public static function button($title, $link)
    {
        //return array_push(self::$buttons, [$title => $link]);
        //self::$buttons[] = [$title => $link];
        array_push(self::$buttons, [$title => $link]);
    }

    public static function getButtons()
    {
        return self::$buttons;
    }

    public static function breadcrumb($title, $link)
    {
        //return array_push(self::$breadcrumbs, [$title => $link]);
        //self::$breadcrumbs[] = [$title => $link];
        array_push(self::$breadcrumbs, [$title => $link]);
    }

    public static function getBreadCrumbs()
    {
        return self::$breadcrumbs;
    }


}