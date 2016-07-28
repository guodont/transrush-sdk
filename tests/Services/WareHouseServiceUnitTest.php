<?php

use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Subscriber\Mock;
use TransRush\Components\ResultSet;

/**
 * Class WareHouseServiceUnitTest
 */
class WareHouseServiceUnitTest extends PHPUnit_Framework_TestCase
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
            'Token' => '104FC78C-7923-404C-82CF-CD88153912AG', // Please use your Token .
            'Env' => 'DEV',
            'Key' => '123456789',
        ]);
    }

    public function testGetWareHouses()
    {
        $response = self::$client->get('/');
        $resultSet = ResultSet::create($response->json());
        $this->assertInstanceOf('TransRush\Components\ResultSet', $resultSet);
        $this->assertEquals("[{\"Location\":\" United States California Industry \",\"PostCode\":\"91746\",\"SupportProducts\":\"ISS|IUP|IPS|IMP|IPP|DPS|IPSR+\",\"Tel\":\"626-280-4888\",\"WareHouseAddress\":\"433 N Baldwin Park Blvd\",\"WareHouseCode\":\"USLAX\",\"WareHouseName\":\"美国洛杉矶仓库\"},{\"Location\":\" United States Oregon Portland Multnomah \",\"PostCode\":\"97230-4497\",\"SupportProducts\":\"ISS|IUP|IPS|IMP|IPP|AIP|DPS|IPSR+\",\"Tel\":\"503-257-3368\",\"WareHouseAddress\":\"15617 NE Airport Way\",\"WareHouseCode\":\"USPDX\",\"WareHouseName\":\"美国波特兰（免税仓）\"},{\"Location\":\" Germany Baden-Wuerttemberg Bruchsal Bruchsal \",\"PostCode\":\"76646\",\"SupportProducts\":\"IGD|IPS|DPS\",\"Tel\":\"0049-7251-3812321\",\"WareHouseAddress\":\"Werner-von-Siemens-Str.9\",\"WareHouseCode\":\"DEFKB\",\"WareHouseName\":\"德国布鲁克赛尔仓库\"},{\"Location\":\" 香港 新界 元朗 \",\"PostCode\":\"111\",\"SupportProducts\":\"ISS|IPS|IHE|AIP|DPS|DDP\",\"Tel\":\"1111\",\"WareHouseAddress\":\"111\",\"WareHouseCode\":\"CNHKG\",\"WareHouseName\":\"香港仓库\"},{\"Location\":\" JAPAN kashiwa kashiwa CHIBA \",\"PostCode\":\"277-0834\",\"SupportProducts\":\"ISS|IPS|IJE|IJS|IMP|IPP|IES|DPS|IPSR+\",\"Tel\":\"0471-28-9988\",\"WareHouseAddress\":\"松ヶ崎新田字水神前13-1\",\"WareHouseCode\":\"JPTYO\",\"WareHouseName\":\"日本千叶仓库\"},{\"Location\":\" 中国 广东省 广州市 白云区 \",\"PostCode\":\"510000\",\"SupportProducts\":\"ISS|IPS|AIP|DPS|DDP\",\"Tel\":\"020-36066999\",\"WareHouseAddress\":\"Room117, lst Floor General Building, North District of Logistics District,\",\"WareHouseCode\":\"GZAIR\",\"WareHouseName\":\"广州机场\"},{\"Location\":\" United Kingdom - SOUTHALL MIDDLESEX \",\"PostCode\":\"UB2 5LF\",\"SupportProducts\":\"IPS|IMP|DPS|DDP|IPSR+\",\"Tel\":\"44(0)2081278528\",\"WareHouseAddress\":\"4PX Transrush Unit 5 Trident way\",\"WareHouseCode\":\"GBLHR\",\"WareHouseName\":\"英国伦敦仓库\"},{\"Location\":\" Australia NSW Sydney Rhodes \",\"PostCode\":\"2138\",\"SupportProducts\":\"ISS|IPS|DPS|IPSR+\",\"Tel\":\"0061-0287573855\",\"WareHouseAddress\":\"2\\/27 Leeds St\",\"WareHouseCode\":\"AUSYD\",\"WareHouseName\":\"澳洲悉尼仓库\"},{\"Location\":\" 中国 广东省 东莞市 沙田镇 \",\"PostCode\":\"523981\",\"SupportProducts\":\"IPS|IHE|DPS\",\"Tel\":\"13927411842\",\"WareHouseAddress\":\"港口大道东莞保税物流中心启盈物流\",\"WareHouseCode\":\"CNB61\",\"WareHouseName\":\"东莞B61保税仓\"},{\"Location\":\" Germany Hessen Raunheim - \",\"PostCode\":\"65479\",\"SupportProducts\":\"IGD|IPS|IMP|DPS|IPSR+\",\"Tel\":\"61424083466\",\"WareHouseAddress\":\"Frankfurter Strasse 85 4PX TransRush\",\"WareHouseCode\":\"DEFRA\",\"WareHouseName\":\"德国法兰克福仓库\"},{\"Location\":\" United States Chicago Chicago Illinois \",\"PostCode\":\"60007\",\"SupportProducts\":\"IPS|DPS|DDP|IPSR+\",\"Tel\":\"8472583910\",\"WareHouseAddress\":\"700 Morse Ave. Elk Grove Village, IL\",\"WareHouseCode\":\"USORD\",\"WareHouseName\":\"美国芝加哥仓库\"},{\"Location\":\" Korea Incheon Bupyeong-gu Incheon \",\"PostCode\":\"403030\\/21312\",\"SupportProducts\":\"ISS|IPS|IPP|DPS|IPSR+\",\"Tel\":\"0325251616\",\"WareHouseAddress\":\"Cheongcheon-dong 177-18 1F 4PX Warehouse\",\"WareHouseCode\":\"KRICN\",\"WareHouseName\":\"韩国仁川仓库\"},{\"Location\":\" Australia Melbourne Victoria Victoria \",\"PostCode\":\"3081\",\"SupportProducts\":\"ISS|IPS|DPS|IPSR+\",\"Tel\":\"61394574387\",\"WareHouseAddress\":\"unit 1&2 670 waterdale rd, heidelberg heights\",\"WareHouseCode\":\"AUMEL\",\"WareHouseName\":\"澳洲墨尔本仓库\"},{\"Location\":\" Singapore Singapore \",\"PostCode\":\"417819\",\"SupportProducts\":\"IPS|DPS\",\"Tel\":\"67439200\",\"WareHouseAddress\":\"30 Kaki Bukit Road 3, #07-02, Empire Technocentre\",\"WareHouseCode\":\"SGSIN\",\"WareHouseName\":\"新加坡（备货）\"},{\"Location\":\" 中国 广东省 东莞市 沙田镇 \",\"PostCode\":\"523981\",\"SupportProducts\":\"IPS|IHE|DPS\",\"Tel\":\"13927411842\",\"WareHouseAddress\":\"港口大道东莞保税物流中心启盈物流\",\"WareHouseCode\":\"DGST \",\"WareHouseName\":\"东莞BBC保税仓\"},{\"Location\":\" 中国 广东省 东莞市 沙田镇 \",\"PostCode\":\"523981\",\"SupportProducts\":\"IPS|IHE|DPS\",\"Tel\":\"13927411842\",\"WareHouseAddress\":\"西大坦新区启盈快件中心\",\"WareHouseCode\":\"DGKJ \",\"WareHouseName\":\"东莞快件仓库\"},{\"Location\":\" New Zealand Auckland Auckland New Lynn \",\"PostCode\":\"0604\",\"SupportProducts\":\"IPS|DPS\",\"Tel\":\"022-0459588\",\"WareHouseAddress\":\"unit8  3038 Great North Road\",\"WareHouseCode\":\"NZAKL\",\"WareHouseName\":\"新西兰奥克兰仓库\"},{\"Location\":\" 中国 香港 新界 大屿山 \",\"PostCode\":\"999077\",\"SupportProducts\":\"IPS|DPS\",\"Tel\":\"00852-12312223\",\"WareHouseAddress\":\"赤鱲角\",\"WareHouseCode\":\"HKAIR\",\"WareHouseName\":\"香港机场\"},{\"Location\":\" Italia - Cambiago - \",\"PostCode\":\"20040\",\"SupportProducts\":\"IPS|DPS\",\"Tel\":\"0039 0292278351\",\"WareHouseAddress\":\"Bas Logistica Italia srl Via Rio Vallone 2\\/A 20040 Cambiago Italia\",\"WareHouseCode\":\"MIL  \",\"WareHouseName\":\"意大利米兰仓库\"},{\"Location\":\" Malaysia Petaling Jaya - Selangor \",\"PostCode\":\"46100\",\"SupportProducts\":\"IPS|DPS\",\"Tel\":\"03-8761 2398\",\"WareHouseAddress\":\"Lot 5 JLN 243\",\"WareHouseCode\":\"MY   \",\"WareHouseName\":\"马来西亚仓库\"},{\"Location\":\" Holland Amsterdam Amsterdam Amsterdam \",\"PostCode\":\"000000\",\"SupportProducts\":\"IPS|DPS\",\"Tel\":\"000000\",\"WareHouseAddress\":\"none\",\"WareHouseCode\":\"NLAMS\",\"WareHouseName\":\"荷兰阿姆斯特丹仓库\"},{\"Location\":\" 中国 广东省 东莞市 沙田镇 \",\"PostCode\":\"523000\",\"SupportProducts\":\"IPS|IPP|DPS\",\"Tel\":\"12345678\",\"WareHouseAddress\":\"广东省东莞市沙田镇西大坦启盈国际快件中心15#递四方\",\"WareHouseCode\":\"DGHK \",\"WareHouseName\":\"中国大陆仓（集运至香港）\"},{\"Location\":\" 中国 广东省 东莞市 沙田镇 \",\"PostCode\":\"523000\",\"SupportProducts\":\"IPS|DPS\",\"Tel\":\"12345678\",\"WareHouseAddress\":\"广东省东莞市沙田镇西大坦启盈国际快件中心15#递四方\",\"WareHouseCode\":\"DGSG \",\"WareHouseName\":\"中国大陆仓（集运至新加坡）\"},{\"Location\":\" 新加坡 Singapore \",\"PostCode\":\"417819\",\"SupportProducts\":\"IPS|DPS\",\"Tel\":\"67439200\",\"WareHouseAddress\":\"30 Kaki Bukit Road 3, #07-02, Empire Technocentre\",\"WareHouseCode\":\"SGJH \",\"WareHouseName\":\"新加坡仓库\"},{\"Location\":\" 中国大陆 广东省 东莞市 沙田镇 \",\"PostCode\":\"523992\",\"SupportProducts\":\"IPP|IPS(CN-HK)|IPS(CN-SG)|DPS\",\"Tel\":\"0755-23508277\",\"WareHouseAddress\":\"西大坦启盈国际快件中心转运四方Z仓\",\"WareHouseCode\":\"DGC  \",\"WareHouseName\":\"中国集运东莞仓\"}]", $resultSet->Data);
        $this->assertEquals('操作成功', $resultSet->Message);
        $this->assertEquals("10000", $resultSet->ResponseCode);
    }

    public function testGetWareHousesFromNet()
    {
        
        $wareHouses = self::$transRush->wareHouseService->getWareHouse();
        $wareHouse = \TransRush\Components\WareHouse\WareHouse::create(\TransRush\Util\ArrayUtil::object_to_array($wareHouses[0]));
        $this->assertEquals("USLAX", $wareHouse->WareHouseCode);
    }
}