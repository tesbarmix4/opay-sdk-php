<?php

namespace Opay\Result;

use stdClass;

class EgyptTransactionStatusResponse extends Response
{

    static function parseData(?stdClass $s): EgyptTransactionStatusResponseData
    {
        return EgyptTransactionStatusResponseData::cast(new EgyptTransactionStatusResponseData, $s);
    }

    public function getData(): EgyptTransactionStatusResponseData
    {
        return $this->data;
    }
}