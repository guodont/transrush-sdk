<?php
namespace TransRush\Components;

/**
 * Class ResultSet
 * @package TransRush\Components
 * 返回结果集
 */
class ResultSet extends Component
{
    /**
     * array of result objects returned
     * @var array
     */
    public $Data = array();

    /**
     * @var string
     */
    public $Message;

    /**
     * @var string
     */
    public $ResponseCode;

    /**
     * ResultSet constructor.
     * @param array $Data
     */
    public function __construct(array $Data)
    {
        $this->Data = $Data;
    }


    public static function create($props)
    {
        $resultSet = new ResultSet($props);
        $resultSet->Message = parent::getValue($props,'Message');
        $resultSet->Data = parent::getValue($props,'Data');
        $resultSet->ResponseCode = parent::getValue($props,'ResponseCode');
        return $resultSet;
    }

    public function toJson()
    {
        return json_encode($this);
    }
}
