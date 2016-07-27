<?php
namespace TransRush\Util;

/**
 * Configuration class to hold endpoints, urls, errors messages etc.
 *
 * @package     Util
 * @author      guodont
 */
class Config
{
    /**
     * @var array - array of configuration properties
     */
    private static $props = array(
        /**
         * REST endpoints
         */
        'endpoints' => array(
            'base_url' => 'http://open.tr.4px.com/',
            'test_url' => 'http://sandbox.tr.4px.com/',
            // 创建预报单
            'create_new1' => 'TRSAPI/PreAlert/CreateNew1',
            // 派送单操作
            'create_order' => 'TRSAPI/Order/Create',
            // 仓库地址查询
            'get_ware_house' => 'TRSAPI/BaseData/GetWareHouse',
            // 修改收货信息
            'update_address' => 'TRSAPI/Order/UpdateAddressNew1',
            // 删除预报单
            'delete_pre_alert' => 'TRSAPI/PreAlert/Delete',
            // 通知发货
            'pay_tax_bill' => 'TRSAPI/Tax/Pay',
            // 扣除运费
            'order_pay' => 'TRSAPI/Order/OrderPay',
            // 物流轨迹查询
            'get_tracking_orders' => 'API/GetTrackingOrder.asmx',
            // 发货人预报单操作
            'create_agent' => 'TRSAPI/Agent/CreateAgent',
            // 代理签出批次
            'check_out' => 'TRSAPI/Order/CheckOut',
            // 代理签出批次
            'get_pod_info' => 'TRSAPI/Delivery/GetPODInfo',
            // 获取订单信息
            'query_order_info' => 'TRSAPI/Order/QueryOrderInfo',
            // 查询认领单信息
            'query_claim_param' => 'TRSAPI/Order/QueryClaimOrde',
        ),
        /**
         * 币种字典
         */
        'currency' => array(
            // 人民币
            'cny' => 'CNY',
            // 美金
            'usd' => 'USD',
            // 欧元
            'eur' => 'EUR',
            // 欧元
            'hkd' => 'HKD',
            // 新加坡币
            'sgd' => 'SGD',
            // 日元
            'JPY' => 'JPY',
            // 英镑
            'gbp' => 'GBP',
            // 韩元
            'krw' => 'KRW',
            // 澳元
            'aud' => 'AUD',
            // 纽元
            'nzd' => 'NZD',
        ),
        /**
         * 仓库操作模式字典
         */
        'order_handle' => array(
            // 合箱 多个卖家订单对应同一个派送单
            'mgr' => 'MGR',
            // 单票(快转) 一个卖家订单对应一个派送单
            'non' => 'NON',
            // 分箱 一个卖家订单对应多个派送单
            'spl' => 'SPL',
        ),
        /**
         * Errors to be returned for various exceptions
         */
        'errors' => array(
            'id_or_object' => 'Only an id or %s object are allowed for this method.',
            'file_extension' => 'Only file extensions of the following are allowed: %s'
        ),

        /**
         * Setting the version fo the application used in Rest Calls when setting the version header
         */
        'settings' => array(
            'version' => '1.0'
        ),
    );

    /**
     * Get a configuration property given a specified location, example usage: Config::get('auth.token_endpoint')
     * @param $index - location of the property to obtain
     * @return string
     */
    public static function get($index)
    {
        $index = explode('.', $index);
        return self::getValue($index, self::$props);
    }

    /**
     * Navigate through a config array looking for a particular index
     * @param array $index The index sequence we are navigating down
     * @param array $value The portion of the config array to process
     * @return mixed
     */
    private static function getValue($index, $value)
    {
        if (is_array($index) && count($index)) {
            $current_index = array_shift($index);
        }
        if (is_array($index) && count($index) && is_array($value[$current_index]) && count($value[$current_index])) {
            return self::getValue($index, $value[$current_index]);
        } else {
            return $value[$current_index];
        }
    }
}
