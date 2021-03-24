<?php

namespace Opay\Result;

use stdClass;

class TransactionInputPinResponse extends Response
{

    static function parseData(?stdClass $s): TransactionInputPinResponseData
    {
        return TransactionInputPinResponseData::cast(new TransactionInputPinResponseData, $s);
    }

    public function getData(): TransactionInputPinResponseData
    {
        return $this->data;
    }
}