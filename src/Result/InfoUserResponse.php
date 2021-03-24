<?php


namespace Opay\Result;


use stdClass;

class InfoUserResponse extends Response
{
    static function parseData(?stdClass $s): InfoUserResponseData
    {
        return InfoUserResponseData::cast(new InfoUserResponseData(), $s);
    }

    public function getData(): InfoUserResponseData
    {
        return $this->data;
    }
}