<?php

namespace Opay\Result;

use stdClass;

class TransactionStatusResponse extends Response
{

    static function parseData(?stdClass $s): TransactionStatusResponseData
    {
        return TransactionStatusResponseData::cast(new TransactionStatusResponseData, $s);
    }

    public function getData(): TransactionStatusResponseData
    {
        return $this->data;
    }
}