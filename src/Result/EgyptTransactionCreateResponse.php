<?php

namespace Opay\Result;

use stdClass;

class EgyptTransactionCreateResponse extends Response
{

    static function parseData(?stdClass $s): EgyptTransactionCreateResponseData
    {
        return EgyptTransactionCreateResponseData::cast(new EgyptTransactionCreateResponseData, $s);
    }

    public function getData(): EgyptTransactionCreateResponseData
    {
        return $this->data;
    }
}