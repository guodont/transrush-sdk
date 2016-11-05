<?php

namespace TransRush\Services;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Stream\Stream;
use TransRush\Components\RequestSet;
use TransRush\Components\ResultSet;
use TransRush\Components\WareHouse\WareHouse;
use TransRush\Util\ArrayUtil;
use TransRush\Util\Config;

/**
 * Class TrackingService
 * @package TransRush\Services
 * @author guodont
 */
class TrackingService extends BaseService implements ITracking
{

    /**
     * 查询转运四方在国外的仓库信息
     * @return array
     * @throws 
     */
    public function getWareHouse()
    {
        $baseUrl = parent::getEnvUrl() . Config::get('endpoints.get_ware_house');

        $request = parent::createBaseRequest(parent::getApiKey(), 'POST', $baseUrl);
       
        $requestSet = new RequestSet();
        $requestSet->Token = parent::getApiKey();
        $requestSet->Data = null;

        $stream = Stream::factory(json_encode($requestSet));
        $request->setBody($stream);

        try {
            $response = parent::getClient()->send($request);
        } catch (ClientException $e) {
            throw parent::convertException($e);
        }

        $body = $response->json();
        $wareHouses = array();
        $res = json_decode(stripcslashes($body['Data']));
        // 这里Data是字符串 需要先反转义
        foreach ($res as $wareHouse) {
            $wareHouses[] = WareHouse::create(ArrayUtil::object_to_array($wareHouse));
        }
        return $wareHouses;
    }

    /**
     * 物流轨迹查询
     * @return mixed
     */
    public function getTrackingOrder($orderNo)
    {
        if ( parent::getEnv() == 'PRO') {
            $host = 'http://api.tr.4px.com/';
        } else {
            $host = 'http://preview.api.transrush.com/';
        }

        $baseUrl = $host . Config::get('endpoints.get_tracking_orders') . '?token='. parent::getApiKey(). '&orderNo=' .$orderNo;

        $request = parent::createBaseRequest(parent::getApiKey(), 'GET', $baseUrl);

        try {
            $response = parent::getClient()->send($request);
        } catch (ClientException $e) {
            throw parent::convertException($e);
        }

        $body = $response->xml();

        $json = json_encode($body);
        $res = json_decode($json,TRUE);

        return $res;
    }
}