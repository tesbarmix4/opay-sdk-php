<?php


namespace Opay\Result;


use stdClass;

class BillsBettingProvidersResponse extends Response
{

    static function parseData(?stdClass $s): BillsBettingProvidersResponseData
    {
        return BillsBettingProvidersResponseData::cast(new BillsBettingProvidersResponseData(), $s);
    }

    public function getData()
    {
        return $this->data;
    }
}