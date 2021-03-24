<?php


namespace Opay\Result;


use stdClass;

class ChargeStatusResponse extends Response
{
    static function parseData(?stdClass $s): ChargeStatusResponseData
    {
        return ChargeStatusResponseData::cast(new ChargeStatusResponseData, $s);
    }

    public function getData(): ChargeStatusResponseData
    {
        return $this->data;
    }

}