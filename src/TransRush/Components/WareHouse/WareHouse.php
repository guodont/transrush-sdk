<?php
/**
 * Created by PhpStorm.
 * User: guodont
 * Date: 16/7/27
 * Time: 下午4:50
 */

namespace TransRush\Components\WareHouse;


use TransRush\Components\Component;

class WareHouse extends Component
{
    public $PostCode;

    public $SupportProducts;

    public $Tel;

    public $WareHouseAddress;

    public $WareHouseCode;

    public $WareHouseName;

    /**
     * Factory method to create an Address object from an array
     * @param array $props - Associative array of initial properties to set
     * @return WareHouse
     */
    public static function create(array $props)
    {
        $wareHouse = new WareHouse();
        $wareHouse->PostCode = parent::getValue($props, "PostCode");
        $wareHouse->SupportProducts = parent::getValue($props, "SupportProducts");
        $wareHouse->Tel = parent::getValue($props, "Tel");
        $wareHouse->WareHouseAddress = parent::getValue($props, "WareHouseAddress");
        $wareHouse->WareHouseCode = parent::getValue($props, "WareHouseCode");
        $wareHouse->WareHouseName = parent::getValue($props, "WareHouseName");
        return $wareHouse;
    }
}