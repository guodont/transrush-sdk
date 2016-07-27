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
use IPreAlert;
use TransRush\Components\PreAlert\CreatePreAlert;
use TransRush\Components\PreAlert\DeletePreAlert;
use TransRush\Components\RequestSet;
use TransRush\Components\ResultSet;
use TransRush\Util\Config;

/**
 * Class PreAlertService
 * @package TransRush\Services
 */
class PreAlertService extends BaseService implements IPreAlert
{
    
    /**
     * 创建预报
     * @return \TransRush\Components\ResultSet
     * @throws
     */
    public function createPreAlert($accessToken, CreatePreAlert $createPreAlert, Array $params = array())
    {
        $baseUrl = Config::get('endpoints.base_url') . Config::get('endpoints.create_new1');

        $request = parent::createBaseRequest($accessToken, 'POST', $baseUrl);
        if ($params) {
            $query = $request->getQuery();
            foreach ($params as $name => $value) {
                $query->add($name, $value);
            }
        }

        $requestSet = new RequestSet();
        $requestSet->Token = $accessToken;
        $requestSet->Data = $createPreAlert;

        $stream = Stream::factory(json_encode($requestSet));
        $request->setBody($stream);

        try {
            $response = parent::getClient()->send($request);
        } catch (ClientException $e) {
            throw parent::convertException($e);
        }

        return ResultSet::create($response->json());
    }

    /**
     * 删除预报
     * @return \TransRush\Components\ResultSet
     * @throws
     */
    public function deletePreAlert($accessToken, DeletePreAlert $deletePreAlert, Array $params = array())
    {
        $baseUrl = Config::get('endpoints.base_url') . Config::get('endpoints.delete_pre_alert');

        $request = parent::createBaseRequest($accessToken, 'POST', $baseUrl);
        if ($params) {
            $query = $request->getQuery();
            foreach ($params as $name => $value) {
                $query->add($name, $value);
            }
        }

        $requestSet = new RequestSet();
        $requestSet->Token = $accessToken;
        $requestSet->Data = $deletePreAlert;

        $stream = Stream::factory(json_encode($requestSet));
        $request->setBody($stream);

        try {
            $response = parent::getClient()->send($request);
        } catch (ClientException $e) {
            throw parent::convertException($e);
        }

        return ResultSet::create($response->json());
    }
}