<?php

namespace Opay\Result;

use stdClass;

class EgyptTransactionReversalResponse extends Response
{

    static function parseData(?stdClass $s): EgyptTransactionReversalResponseData
    {
        return EgyptTransactionReversalResponseData::cast(new EgyptTransactionReversalResponseData, $s);
    }

    public function getData(): EgyptTransactionCreateResponseData
    {
        return $this->data;
    }
}