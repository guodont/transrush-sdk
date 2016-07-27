<?php
use TransRush\Components\PreAlert\CreatePreAlert;
use TransRush\Components\PreAlert\DeletePreAlert;

/**
 * Created by PhpStorm.
 * User: guodont
 * Date: 16/7/27
 * Time: 下午5:08
 */
interface IPreAlert
{
    /**
     * 创建预报
     * @return \TransRush\Components\ResultSet
     */
    public function createPreAlert($accessToken, CreatePreAlert $createPreAlert, Array $params = array());

    /**
     * 删除预报
     * @return \TransRush\Components\ResultSet
     */
    public function deletePreAlert($accessToken, DeletePreAlert $deletePreAlert, Array $params = array());
}