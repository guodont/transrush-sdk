<?php
/**
 * Created by PhpStorm.
 * User: guodont
 * Date: 16/7/27
 * Time: 下午4:42
 */

namespace TransRush\Components\PreAlert;


use TransRush\Components\Component;

/**
 * Class DeletePreAlert
 * @package TransRush\Components\PreAlert
 * 删除预报单 请求数据
 */
class DeletePreAlert extends Component
{

    /**
     * 会员编号，由会员注册后由转运四方提供
     * @var string
     */
    public $UserCode;

    /**
     * 发件承运商面单号码，国外物流派送公司的物流单号
     * @var string
     */
    public $CarrierDeliveryNo;

    /**
     * Factory method to create a DeletePreAlert object from an array
     * @param array $props - Associative array of initial properties to set
     * @return DeletePreAlert
     */
    public static function create(array $props)
    {
        $deletePreAlert = new DeletePreAlert();

        $deletePreAlert->UserCode = parent::getValue($props, "UserCode");
        $deletePreAlert->CarrierDeliveryNo = parent::getValue($props, "CarrierDeliveryNo");

        return $deletePreAlert;
    }
}