<?php

use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\Mock;
use TransRush\Components\ResultSet;

/**
 * Created by PhpStorm.
 * User: guodont
 * Date: 16/7/28
 * Time: 下午1:04
 */
class PreAlertServiceUnitTest extends PHPUnit_Framework_TestCase
{
    private static $client;

    public static function setUpBeforeClass()
    {
        self::$client = new Client();
        $addPreAlertStream = Stream::factory(JsonLoader::getAddPreAlert());
        $mock = new Mock([
            new Response(200, array(), $addPreAlertStream)
        ]);
        self::$client->getEmitter()->attach($mock);
    }

    public function testAddPreAlert()
    {
        $response = self::$client->post('/');
        $resultSet = ResultSet::create($response->json());
        $this->assertInstanceOf('TransRush\Components\ResultSet', $resultSet);
        $this->assertEquals('',$resultSet->Data);
        $this->assertEquals('SUCCESS',$resultSet->Message);
        $this->assertEquals('201',$resultSet->ResponseCode);
    }
    
}