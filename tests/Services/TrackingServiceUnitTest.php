<?php

use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\Mock;
use TransRush\Components\ResultSet;

/**
 * Class TrackingServiceUnitTest
 */
class TrackingServiceUnitTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Client
     */
    private static $client;
    
    private static $transRush;

    public static function setUpBeforeClass()
    {
        self::$client = new Client();
        $getWareHouses = Stream::factory(JsonLoader::getWareHouse());
        $mock = new Mock([
            new Response(200, array(), $getWareHouses)
        ]);
        self::$client->getEmitter()->attach($mock);

        self::$transRush = new \TransRush\TransRush([
//            'Token' => '104FC78C-7923-404C-82CF-CD88153912AG', // Please use your Token .
            'Token' => '3E3CB737-FD2E-4699-9E25-66ADA387C37A', // Please use your Token .
            'Env' => 'DEV',
            'Key' => 'CD88153912AG',
        ]);
    }

    public function testGetTrackingOrder()
    {
        $info = self::$transRush->trackingService->getTrackingOrder('9101128882300385863589');
        $this->assertArrayHasKey('Data',$info);
    }
}