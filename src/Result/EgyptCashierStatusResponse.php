<?php

namespace Opay\Result;

use stdClass;

class EgyptCashierStatusResponse extends Response
{

    static function parseData(?stdClass $s): EgyptCashierStatusResponseData
    {
        return EgyptCashierStatusResponseData::cast(new EgyptCashierStatusResponseData, $s);
    }

    public function getData(): EgyptCashierStatusResponseData
    {
        return $this->data;
    }
}