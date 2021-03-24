<?php

namespace Opay\Result;

use stdClass;

class BalancesResponse extends Response
{

    /**
     * @param stdClass|null $s
     * @return BalancesResponseData
     */
    static function parseData(?stdClass $s): BalancesResponseData
    {
        return BalancesResponseData::cast(new BalancesResponseData, $s);
    }

    /**
     * @return object
     */
    public function getData(): object
    {
        return $this->data;
    }
}