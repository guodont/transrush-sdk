<?php

namespace TransRush;
use TransRush\Services\PreAlertService;
use TransRush\Services\WareHouseService;
use TransRush\WebHooks\TransRushWebHookUtil;

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
     * @var TransRushWebHookUtil
     */
    public $transRushWebHookUtil;

    /**
     * TransRush constructor.
     * @param array $settings
     */
    public function __construct(array $settings)
    {
        $this->preAlertService = new PreAlertService($settings);
        $this->wareHouseService = new WareHouseService($settings);
        $this->transRushWebHookUtil = new TransRushWebHookUtil($settings['Key']);
    }


}