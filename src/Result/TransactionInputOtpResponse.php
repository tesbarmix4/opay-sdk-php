<?php

namespace Opay\Result;

use stdClass;

class TransactionInputOtpResponse extends Response
{

    static function parseData(?stdClass $s): TransactionInputOtpResponseData
    {
        return TransactionInputOtpResponseData::cast(new TransactionInputOtpResponseData, $s);
    }

    public function getData(): TransactionInputOtpResponseData
    {
        return $this->data;
    }
}