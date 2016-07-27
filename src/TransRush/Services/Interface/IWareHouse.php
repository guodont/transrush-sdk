<?php
use TransRush\Components\WareHouse\WareHouse;

/**
 * Created by PhpStorm.
 * User: guodont
 * Date: 16/7/27
 * Time: 下午5:12
 */
interface IWareHouse
{
    /**
     * 查询转运四方在国外的仓库信息
     * @return mixed
     */
    public function getWareHouse($accessToken);
}