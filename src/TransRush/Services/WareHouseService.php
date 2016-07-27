<?php
/**
 * Created by PhpStorm.
 * User: guodont
 * Date: 16/7/27
 * Time: 下午5:13
 */

namespace TransRush\Services;


use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Stream\Stream;
use TransRush\Components\RequestSet;
use TransRush\Components\ResultSet;
use TransRush\Components\WareHouse\WareHouse;
use TransRush\Util\Config;

/**
 * Class WareHouseService
 * @package TransRush\Services
 */
class WareHouseService extends BaseService implements \IWareHouse
{

    /**
     * 查询转运四方在国外的仓库信息
     * @return array
     * @throws 
     */
    public function getWareHouse($accessToken)
    {
        $baseUrl = Config::get('endpoints.base_url') . Config::get('endpoints.get_ware_house');

        $request = parent::createBaseRequest($accessToken, 'POST', $baseUrl);
       
        $requestSet = new RequestSet();
        $requestSet->Token = $accessToken;
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
        foreach ($body['Data'] as $wareHouse) {
            $wareHouses[] = WareHouse::create($wareHouse);
        }
        
        return $wareHouses;
    }
}