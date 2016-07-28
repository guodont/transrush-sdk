<?php

/**
 * Created by PhpStorm.
 * User: guodont
 * Date: 16/7/28
 * Time: 下午12:59
 */
class JsonLoader
{
    const PRE_ALERT_FOLDER = "/PreAlert";

    const WARE_HOUSE_FOLDER = "/WareHouse";

    public static function getAddPreAlert()
    {
        return file_get_contents(__DIR__ . self::PRE_ALERT_FOLDER . "/post_pre_alert.json");
    }
    
    public static function getWareHouse()
    {
        return file_get_contents(__DIR__ . self::WARE_HOUSE_FOLDER . "/get_ware_house.json");
    }
}