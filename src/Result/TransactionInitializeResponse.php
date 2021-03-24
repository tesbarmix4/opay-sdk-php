<?php

namespace Opay\Result;

use stdClass;

class TransactionInitializeResponse extends Response
{

    static function parseData(?stdClass $s): TransactionInitializeResponseData
    {
        return TransactionInitializeResponseData::cast(new TransactionInitializeResponseData, $s);
    }

    public function getData(): TransactionInitializeResponseData
    {
        return $this->data;
    }
}