<?php

namespace TransRush\Components\PreAlert;

use TransRush\Components\Component;

/**
 * Class CreatePreAlert
 * @package TransRush\Components\PreAlert
 * CreatePreAlert 预报单信息 请求数据
 */
class CreatePreAlert extends Component
{
    /**
     * 接入商唯一订单编码，用于唯一标识某订单，并且在分箱与合箱时更新此编号查找需要分箱与合箱的包裹
     * @var string
     */
    public $ShipperOrderNo;

    /**
     * 收货仓库代码 详见仓库代码定义字典表
     * @var string
     */
    public $WarehouseCode;

    /**
     * 仓库操作模式，如单票、合箱、分箱 详见仓库操作模式字义字典表
     * @var string
     */
    public $WarehouseOperateMode;

    /**
     * 发件承运商面单号码，国外物流派送公司的物流单号
     * @var string
     */
    public $CarrierDeliveryNo;

    /**
     * 发件承运商公司代码，国外物流派送公司的简写名称 详见承运商公司定义字典表
     * @var string
     */
    public $CarrierCompanyCode;

    /**
     * 服务类型代码 详见服务类型定义字典表
     * @var string
     */
    public $ServiceTypeCode;

    /**
     * 货物申报币种－使用国际货币标准码 详见币种字义字典表
     * @var string
     */
    public $ItemDeclareCurrency;

    /**
     * 收件人姓名
     * @var string
     */
    public $ConsigneeName;

    /**
     * 目的地国家
     * @var string
     */
    public $CountryOfDestination;

    /**
     * 收货国家
     * @var string
     */
    public $ReceiptCountry;

    /**
     * 收货省份
     * @var string
     */
    public $Province;

    /**
     * 收件城市
     * @var string
     */
    public $City;

    /**
     * 收件区/县
     * @var string
     */
    public $District;

    /**
     * 收件街道及门牌号码
     * @var string
     */
    public $ConsigneeStreetDoorNo;

    /**
     * 收件邮编
     * @var string
     */
    public $ConsigneePostCode;

    /**
     * 收件人手机号码
     * @var string
     */
    public $ConsigneeMobile;

    /**
     * 收件人电子信箱
     * @var string
     */
    public $ConsigneeEMail;

    /**
     * 证件类型 目前只支持身份证，类型代码为IDCD
     * @var string
     */
    public $ConsigneeIDType = 'IDCD';

    /**
     * 收件人证件号码，如果使用的转运服务要求上传清关身份证信息，则此项必填
     * @var string
     */
    public $ConsigneeIDNumber;

    /**
     * 收件人证件正面扫描图片URL 如果使用的转运服务要求上传清关身份证信息，则此项必填
     * @var string
     */
    public $ConsigneeIDFrontCopy;

    /**
     * 收件人证件反面扫描图片URL 如果使用的转运服务要求上传清关身份证信息，则此项必填
     * @var string
     */
    public $ConsigneeIDBackCopy;

    /**
     * 仓库操作指示
     * @var string
     */
    public $OperatingInstructions;

    /**
     * 会员编号，由会员注册后由转运四方提供
     * @var string
     */
    public $UserCode;

    /**
     * 附加参数(用于一些客户自定义的信息)
     * @var string
     */
    public $AttachParam;

    /**
     *  税费费用承担方式：DDU由收件人支付关税 DDP 由寄件方支付关税（默认）
     * @var string
     */
    public $TaxMode;

    /**
     * 是否购买保险，true为购买保险
     * @var boolean
     */
    public $HasInsure;

    /**
     * 预报单商品信息
     * @var Item[]
     */
    public $ITEMS = array();


    public function addItem($item)
    {
        if (!$item instanceof Item) {
            $item2 = new Item($item);
        }

        $this->ITEMS[] = $item2;
    }

    /**
     * Factory method to create a CreatePreAlert object from an array
     * @param array $props - Associative array of initial properties to set
     * @return CreatePreAlert
     */
    public static function create(array $props)
    {
        $preAlert = new CreatePreAlert();
        
        $preAlert->AttachParam = parent::getValue($props, "AttachParam");
        $preAlert->CarrierCompanyCode = parent::getValue($props, "CarrierCompanyCode");
        $preAlert->CarrierDeliveryNo = parent::getValue($props, "CarrierDeliveryNo");
        $preAlert->City = parent::getValue($props, "City");
        $preAlert->ConsigneeEMail = parent::getValue($props, "ConsigneeEMail");
        $preAlert->ConsigneeIDBackCopy = parent::getValue($props, "ConsigneeIDBackCopy");
        $preAlert->ConsigneeIDFrontCopy = parent::getValue($props, "ConsigneeIDFrontCopy");
        $preAlert->ConsigneeIDNumber = parent::getValue($props, "ConsigneeIDNumber");
        $preAlert->ConsigneeIDType = parent::getValue($props, "ConsigneeIDType");
        $preAlert->ConsigneeMobile = parent::getValue($props, "ConsigneeMobile");
        $preAlert->ConsigneeName = parent::getValue($props, "ConsigneeName");
        $preAlert->ConsigneePostCode = parent::getValue($props, "ConsigneePostCode");
        $preAlert->ConsigneeStreetDoorNo = parent::getValue($props, "ConsigneeStreetDoorNo");
        $preAlert->CountryOfDestination = parent::getValue($props, "CountryOfDestination");
        $preAlert->District = parent::getValue($props, "District");
        $preAlert->HasInsure = parent::getValue($props, "HasInsure");
        $preAlert->OperatingInstructions = parent::getValue($props, "OperatingInstructions");
        $preAlert->ItemDeclareCurrency = parent::getValue($props, "ItemDeclareCurrency");
        $preAlert->Province = parent::getValue($props, "Province");
        $preAlert->ReceiptCountry = parent::getValue($props, "ReceiptCountry");
        $preAlert->ServiceTypeCode = parent::getValue($props, "ServiceTypeCode");
        $preAlert->ShipperOrderNo = parent::getValue($props, "ShipperOrderNo");
        $preAlert->TaxMode = parent::getValue($props, "TaxMode");
        $preAlert->UserCode = parent::getValue($props, "UserCode");
        $preAlert->WarehouseCode = parent::getValue($props, "WarehouseCode");
        $preAlert->WarehouseOperateMode = parent::getValue($props, "WarehouseOperateMode");

        if (isset($props['ITEMS'])) {
            foreach ($props['ITEMS'] as $item) {
                $preAlert->ITEMS[] = Item::create($item);
            }
        }
        
        return $preAlert;
    }

}