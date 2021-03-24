<?php

namespace Opay\Result;

use stdClass;

class TransactionInputDobResponse extends Response
{

    static function parseData(?stdClass $s): TransactionInputDobResponseData
    {
        return TransactionInputDobResponseData::cast(new TransactionInputDobResponseData, $s);
    }

    public function getData(): TransactionInputDobResponseData
    {
        return $this->data;
    }
}