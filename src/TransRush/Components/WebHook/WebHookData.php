<?php
/**
 * Created by PhpStorm.
 * User: guodont
 * Date: 16/7/27
 * Time: 下午4:50
 */

namespace TransRush\Components\WareHouse;


use TransRush\Components\Component;

class WebHookData extends Component
{
    public $SeqID;

    public $Type;

    public $Timestamp;

    public $Data;

    public $Signature;

    /**
     * Factory method to create an Address object from an array
     * @param array $props - Associative array of initial properties to set
     * @return WebHookData
     */
    public static function create(array $props)
    {
        $webHookData = new WebHookData();
        $webHookData->SeqID = parent::getValue($props, "SeqID");
        $webHookData->Type = parent::getValue($props, "Type");
        $webHookData->Timestamp = parent::getValue($props, "Timestamp");
        $webHookData->Data = parent::getValue($props, "Data");
        $webHookData->Signature = parent::getValue($props, "Signature");
        return $webHookData;
    }

    public function toJson()
    {
        return json_encode($this);
    }
}