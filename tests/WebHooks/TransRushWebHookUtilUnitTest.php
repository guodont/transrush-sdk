<?php
use TransRush\TransRush;
use TransRush\Util\ArrayUtil;
use TransRush\WebHooks\TransRushWebHookUtil;

/**
 * Created by PhpStorm.
 * User: guodont
 * Date: 16/7/28
 * Time: 下午4:03
 */
class TransRushWebHookUtilUnitTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \TransRush\TransRush
     */
    private static $transRush;

    public static function setUpBeforeClass()
    {
        self::$transRush = new TransRush([
            'Token' => '104FC78C-7923-404C-82CF-CD88153912AG', // Please use your Token .
            'Env' => 'DEV',
            'Key' => '123456789',
        ]);
    }

//    public function testValidWebHook()
//    {
//        $this->assertEquals(true, self::$transRush->transRushWebHookUtil->isValidWebHook(ArrayUtil::object_to_array(json_decode(stripcslashes(("{\"SeqID\":\"1\",\"Type\":\"TRACKING\",\"Timestamp\":\"1409565308\",\"Data\":\"eyJTaGlwcGVyT3JkZXJObyI6IjEyMzQ1NiIsIlRUaW1lIjoiMTQwOTU2NTM4OCIsIlRMb2NhdGlvbiI6IuWkqea0pSIsIlRDb2RlIjoiIiwiQ29udGV4dCI6IuW3suWujOaIkOa4heWFsyIsIkVDb250ZXh0IjoiIn0=\",\"Signature\":\"94471cb39950ecd956139352e7136341\"}"))))));
//    }
}