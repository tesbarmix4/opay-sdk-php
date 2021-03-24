<?php


namespace Opay\Result;


use stdClass;

class InfoUserUpdateResponse extends Response
{
    static function parseData(?stdClass $s): InfoUserUpdateResponseData
    {
        return InfoUserUpdateResponseData::cast(new InfoUserUpdateResponseData(), $s);
    }

    public function getData(): InfoUserUpdateResponseData
    {
        return $this->data;
    }
}