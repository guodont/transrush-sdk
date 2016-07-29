<?php
namespace TransRush\Components\PreAlert;

use TransRush\Components\Component;
/**
 * Created by PhpStorm.
 * User: guodont
 * Date: 16/7/27
 * Time: 下午3:14
 * 货物申报-货物-item
 */
class Item extends Component
{
    /**
     * 货物申报类型，申报类型如果是禁运物品将无法成功预报。详见转运四方货物品类表.xlsx
     * @var string
     */
    public $ItemDeclareType;

    /**
     * 货物识别码，一般与商品条码对应
     * @var string
     */
    public $ItemSKU;

    /**
     * 货物英文品名
     * @var string
     */
    public $ItemNameEnglish;

    /**
     * 货物品名（进口国申报要求的语言）
     * @var string
     */
    public $ItemNameLocalLang;

    /**
     * 货物规格型号，例如尺码、颜色、外形等
     * @var string
     */
    public $Specifications;

    /**
     * 数量
     * @var integer
     */
    public $ItemNumber;

    /**
     * 品牌
     * @var string
     */
    public $Brand;

    /**
     * 规格
     * @var string
     */
    public $Spec;

    /**
     * 单价
     * @var float
     */
    public $ItemUnitPrice;

    /**
     * 总金额
     * @var float
     */
    public $ItemTotalAmount;

    /**
     * Factory method to create an Address object from an array
     * @param array $props - Associative array of initial properties to set
     * @return Item
     */
    public static function create(array $props)
    {
        $item = new Item();
        $item->Brand = parent::getValue($props, "Brand");
        $item->ItemDeclareType = parent::getValue($props, "ItemDeclareType");
        $item->ItemNameEnglish = parent::getValue($props, "ItemNameEnglish");
        $item->ItemNameLocalLang = parent::getValue($props, "ItemNameLocalLang");
        $item->ItemNumber = parent::getValue($props, "ItemNumber");
        $item->ItemSKU = parent::getValue($props, "ItemSKU");
        $item->ItemTotalAmount = parent::getValue($props, "ItemTotalAmount");
        $item->ItemUnitPrice = parent::getValue($props, "ItemUnitPrice");
        $item->Spec = parent::getValue($props, "Spec");
        $item->Specifications = parent::getValue($props, "Specifications");
        return $item;
    }
}