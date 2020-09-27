<?php

namespace App\Helpers;

class Seo {

    static private $title;
    static private $desc;

    public static function setTitle($title){
        self::$title = $title;
    }

    public static function setDescription($desc){
        self::$desc = $desc;
    }

    public static function getTitle(){
        return self::$title ? self::$title : '';
    }

    public static function getDescription(){
        return self::$desc ? self::$desc : '';
    }

}