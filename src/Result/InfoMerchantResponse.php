<?php


namespace Opay\Result;


use stdClass;

class InfoMerchantResponse extends Response
{
    static function parseData(?stdClass $s): InfoMerchantResponseData
    {
        return InfoMerchantResponseData::cast(new InfoMerchantResponseData(), $s);
    }

    public function getData(): InfoMerchantResponseData
    {
        return $this->data;
    }
}