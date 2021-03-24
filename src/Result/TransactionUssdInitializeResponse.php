<?php


namespace Opay\Result;


use stdClass;

class TransactionUssdInitializeResponse extends Response
{
    static function parseData(?stdClass $s): TransactionUssdInitializeResponseData
    {
        return TransactionUssdInitializeResponseData::cast(new TransactionUssdInitializeResponseData, $s);
    }

    public function getData(): TransactionUssdInitializeResponseData
    {
        return $this->data;
    }

}