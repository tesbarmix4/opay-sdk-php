<?php


namespace Opay\Result;


use stdClass;

class InfoUserCreateResponse extends Response
{
    static function parseData(?stdClass $s): InfoUserCreateResponseData
    {
        return InfoUserCreateResponseData::cast(new InfoUserCreateResponseData(), $s);
    }

    public function getData(): InfoUserCreateResponseData
    {
        return $this->data;
    }
}