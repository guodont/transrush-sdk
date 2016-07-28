<?php

namespace TransRush\Services;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Stream\Stream;
use TransRush\Services\IPreAlert;
use TransRush\Components\PreAlert\CreatePreAlert;
use TransRush\Components\PreAlert\DeletePreAlert;
use TransRush\Components\RequestSet;
use TransRush\Components\ResultSet;
use TransRush\Util\Config;

/**
 * Class PreAlertService
 * @package TransRush\Services
 * @author guodont
 */
class PreAlertService extends BaseService implements IPreAlert
{
    
    /**
     * 创建预报
     * @return \TransRush\Components\ResultSet
     * @throws
     */
    public function createPreAlert(CreatePreAlert $createPreAlert, Array $params = array())
    {
        $baseUrl = parent::getEnvUrl() . Config::get('endpoints.create_new1');

        $request = parent::createBaseRequest(parent::getApiKey(), 'POST', $baseUrl);
        if ($params) {
            $query = $request->getQuery();
            foreach ($params as $name => $value) {
                $query->add($name, $value);
            }
        }

        $requestSet = new RequestSet();
        $requestSet->Token = parent::getApiKey();
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
    public function deletePreAlert(DeletePreAlert $deletePreAlert, Array $params = array())
    {
        $baseUrl = parent::getEnvUrl() . Config::get('endpoints.delete_pre_alert');

        $request = parent::createBaseRequest(parent::getApiKey(), 'POST', $baseUrl);
        if ($params) {
            $query = $request->getQuery();
            foreach ($params as $name => $value) {
                $query->add($name, $value);
            }
        }

        $requestSet = new RequestSet();
        $requestSet->Token = parent::getApiKey();
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