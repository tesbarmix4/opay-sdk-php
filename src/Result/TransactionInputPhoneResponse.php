<?php

namespace Opay\Result;

use stdClass;

class TransactionInputPhoneResponse extends Response
{

    static function parseData(?stdClass $s): TransactionInputPhoneResponseData
    {
        return TransactionInputPhoneResponseData::cast(new TransactionInputPhoneResponseData, $s);
    }

    public function getData(): TransactionInputOtpResponseData
    {
        return $this->data;
    }
}