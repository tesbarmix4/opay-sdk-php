<?php

namespace Opay\Result;

use stdClass;

class EgyptTransactionRefundStatusResponse extends Response
{

    static function parseData(?stdClass $s): EgyptTransactionRefundStatusResponseData
    {
        return EgyptTransactionRefundStatusResponseData::cast(new EgyptTransactionRefundStatusResponseData, $s);
    }

    public function getData(): EgyptTransactionCreateResponseData
    {
        return $this->data;
    }
}