<?php
namespace TransRush\Services;

/**
 * Created by PhpStorm.
 * User: guodont
 * Date: 16/7/28
 * Time: 上午10:22
 * 
 * 无用..
 */
interface IWebHook
{
    /**
     * 获取派送物流号推送信息
     * @param array $data
     * @return mixed
     */
    public function getCarrierDeliveryNoData(Array $data = array());

    /**
     * 获取订单关税图片推送信息
     * @param array $data
     * @return mixed
     */
    public function getCustomsTariffPicData(Array $data = array());

    /**
     * 获取订单关税推送信息
     * @param array $data
     * @return mixed
     */
    public function getCustomsTariffData(Array $data = array());

    /**
     * 获取认领单推送信息
     * @param array $data
     * @return mixed
     */
    public function getClaimBillData(Array $data = array());
}