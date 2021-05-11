<?php

namespace Opay\Result;

use stdClass;

class EgyptCashierResponse extends Response
{

    static function parseData(?stdClass $s): EgyptCashierResponseData
    {
        return EgyptCashierResponseData::cast(new EgyptCashierResponseData, $s);
    }

    public function getData(): EgyptCashierResponseData
    {
        return $this->data;
    }
}