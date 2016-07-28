<?php
namespace TransRush\WebHooks;

use TransRush\Components\WebHook\WebHookData;
use TransRush\Exceptions\TransRushException;

/**
 * Class TransRushWebHookUtil
 * @package TransRush\WebHooks
 *
 * @author guodont
 */
class TransRushWebHookUtil
{

    /**
     * The client secret(KEY) associated with the api key
     */
    private $clientSecret = '';


    /**
     * Constructor that creates a validation Object for WebHooks.
     *
     * @param string $clientSecret - The client secret associated with the api key
     * @return  TransRushWebHookUtil
     */
    function __construct($clientSecret = '')
    {
        $this->setClientSecret($clientSecret);
    }


    /**
     * TransRushWebHookUtil::getClientSecret()
     *
     * @return string - the secret API key
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }


    /**
     * TransRushWebHookUtil::setClientSecret()
     * Set the clientSecret
     *
     * @param string $clientSecret - The client secret associated with the api key
     * @return void
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }


    /**
     * @param $bodyMessage
     * @return WebHookData
     * @throws TransRushException
     */
    public function getNotification($bodyMessage)
    {
        if ($this->isValidWebhook($bodyMessage)) {
            return WebHookData::create($bodyMessage);
        } else {
            throw new TransRushException("Invalid WebHook");
        }
    }

    /**
     *
     * 示例数据
     * {
     *      "SeqID": "1",
     *      "Type": "TRACKING",
     *      "Timestamp": "1409565308",
     *      "Data": "eyJTaGlwcGVyT3JkZXJObyI6IjEyMzQ1NiIsIlRUaW1lIjoiMTQwOTU2NTM4OCIsIlRMb2NhdGlvbiI6IuWkqea0pSIsIlRDb2RlIjoiIiwiQ29udGV4dCI6IuW3suWujOaIkOa4heWFsyIsIkVDb250ZXh0IjoiIn0=",
     *      "Signature": "94471cb39950ecd956139352e7136341"
     *  }
     * @param $bodyMessage
     * @return bool
     * @throws TransRushException
     */
    public function isValidWebHook($bodyMessage)
    {
        if ($this->getClientSecret() == null) {
            throw new TransRushException("NO_CLIENT_SECRET");
        }
        $webHookData = WebHookData::create($bodyMessage);
        $key = self::getClientSecret();
        $encodedString = $webHookData->SeqID . $webHookData->Timestamp . $webHookData->Data . $key;
        return (md5($encodedString) == $webHookData->Signature) ? true : false;
    }
    
}
