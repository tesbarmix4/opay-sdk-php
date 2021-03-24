<?php


namespace Opay\Result;


use stdClass;

class BillsValidateResponse extends Response
{

    static function parseData(?stdClass $s): BillsValidateResponseData
    {
        return BillsValidateResponseData::cast(new BillsValidateResponseData(), $s);
    }

    public function getData()
    {
        $this->data;
    }
}