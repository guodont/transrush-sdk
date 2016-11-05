<?php
namespace TransRush\Services;

/**
 * Interface ITracking
 * @package TransRush\Services
 * @author guodont
 */
interface ITracking
{
    /**
     * 物流轨迹查询
     *
     * @param $orderNo
     *
     * @return mixed
     */
    public function getTrackingOrder($orderNo);
}