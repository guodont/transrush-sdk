<?php
namespace TransRush\Exceptions;

use Exception;

/**
 * General exception
 *
 * @package     exceptions
 * @author         djellesma
 */
class TransRushException extends Exception
{
    private $errors;

    private $url;

    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getCurlInfo()
    {
        return $this->url;
    }
}
