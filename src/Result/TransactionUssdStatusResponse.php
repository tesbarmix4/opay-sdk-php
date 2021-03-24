<?php


namespace Opay\Result;


use stdClass;

class TransactionUssdStatusResponse extends Response
{
    static function parseData(?stdClass $s): TransactionUssdStatusResponseData
    {
        return TransactionUssdStatusResponseData::cast(new TransactionUssdStatusResponseData, $s);
    }

    public function getData(): TransactionUssdStatusResponseData
    {
        return $this->data;
    }

}