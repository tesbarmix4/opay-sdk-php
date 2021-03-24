<?php


namespace Opay\Result;


use stdClass;

class ChargeInitializeResponse extends Response
{
    static function parseData(?stdClass $s): ChargeInitializeResponseData
    {
        return ChargeInitializeResponseData::cast(new ChargeInitializeResponseData, $s);
    }

    public function getData(): ChargeInitializeResponseData
    {
        return $this->data;
    }

}