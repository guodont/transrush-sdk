<?php
/**
 * Created by PhpStorm.
 * User: guodont
 * Date: 16/7/27
 * Time: 下午4:22
 */

namespace TransRush\Components;


use TransRush\Components\Component;

/**
 * Class CreatePreAlert
 * @package TransRush\Components
 * 请求json 封装
 */
class RequestSet extends Component
{
    /**
     * 请求Token 配置文件中设置
     * @var string
     */
    public $Token;

    /**
     * 请求的详细信息
     * @var array
     */
    public $Data = array();

    public static function create($props)
    {
        $requestSet = new RequestSet($props);
        $requestSet->Token = parent::getValue($props,'Token');
        $requestSet->Data = parent::getValue($props,'Data');
        return $requestSet;
    }

    public function toJson()
    {
        if ($this->Data==null)
            unset($this->Data);
        return json_encode($this);
    }
}