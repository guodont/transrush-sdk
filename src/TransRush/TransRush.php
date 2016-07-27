<?php

namespace TransRush;
use TransRush\Services\PreAlertService;
use TransRush\Services\WareHouseService;

/**
 * Created by PhpStorm.
 * User: guodont
 * Date: 16/7/27
 * Time: 上午10:33
 */
class TransRush
{
    /**
     * @var PreAlertService
     */
    public $preAlertService;

    /**
     * @var WareHouseService
     */
    public $wareHouseService;

    /**
     * TransRush constructor.
     */
    public function __construct($apiKey)
    {
        $this->preAlertService = new PreAlertService($apiKey);
        $this->wareHouseService = new WareHouseService($apiKey);
    }


}