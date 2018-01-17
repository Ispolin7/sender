<?php
/**
 * Created by PhpStorm.
 * User: Dom
 * Date: 13.01.2018
 * Time: 19:23
 */

namespace App\Model;


trait Selectable

{
    public static function getSelectList($value = 'name', $key = 'id'){
        return static::latest()->pluck($value, $key);
    }

}