<?php

namespace Opay\Result;

use stdClass;

class EgyptTransactionRefundResponse extends Response
{

    static function parseData(?stdClass $s): EgyptTransactionRefundResponseData
    {
        return EgyptTransactionRefundResponseData::cast(new EgyptTransactionRefundResponseData, $s);
    }

    public function getData(): EgyptTransactionCreateResponseData
    {
        return $this->data;
    }
}