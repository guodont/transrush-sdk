<?php
namespace TransRush\Services;

use TransRush\Exceptions\TransRushException;
use TransRush\Util\Config;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

/**
 * Super class for all services
 *
 * @package Services
 * @author Constant Contact
 */
abstract class BaseService
{
    /**
     * Helper function to return required headers for making an http request with constant contact
     * @param $accessToken - OAuth2 access token to be placed into the Authorization header
     * @return array - authorization headers
     */
    private static function getHeaders($accessToken)
    {
        return array(
            'User-Agent' => 'E-buy-365 PHP for transRush Library v' . Config::get('settings.version'),
            'Content-Type' => 'text/json; charset=utf-8',
            'Accept' => 'application/json',
//            'Authorization' => 'Bearer ' . $accessToken
        );
    }

    /**
     * GuzzleHTTP Client Implementation to use for HTTP requests
     * @var Client
     */
    private $client;

    /**
     * ApiKey for the application
     * @var string
     */
    private $apiKey;
    
    private $env;

    /**
     * BaseService constructor.
     * @param array $settings
     */
    public function __construct(array $settings)
    {
        $this->apiKey = $settings['Token'];
        $this->env = $settings['Env'];
        $this->client = new Client();
    }
    
    /**
     * Get the rest client being used by the service
     * @return Client - GuzzleHTTP Client implementation being used
     */
    protected function getClient()
    {
        return $this->client;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function getEnvUrl()
    {
        if($this->env == 'PRO') {
            return Config::get('endpoints.base_url');
        } else {
            return Config::get('endpoints.dev_url');
        }
    }


    protected function createBaseRequest($accessToken, $method, $baseUrl) {
        $request = $this->client->createRequest($method, $baseUrl);
//        $request->getQuery()->set("api_key", $this->apiKey);
        $request->setHeaders($this->getHeaders($accessToken));
        return $request;
    }

    /**
     * Turns a ClientException into a CtctException - like magic.
     * @param ClientException $exception - Guzzle ClientException
     * @return CtctException
     */
    protected function convertException($exception)
    {
        $ctctException = new CtctException($exception->getResponse()->getReasonPhrase(), $exception->getCode());
        $ctctException->setUrl($exception->getResponse()->getEffectiveUrl());
        $ctctException->setErrors(json_decode($exception->getResponse()->getBody()->getContents()));
        return $ctctException;
    }
}
