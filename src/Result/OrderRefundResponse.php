<?php

namespace Opay\Result;

class OrderRefundResponse extends Response
{

    static function parseData(?\stdClass $s): OrderRefundResponseData
    {
        return OrderRefundResponseData::cast(new OrderRefundResponseData(), $s);
    }

    /**
     * @return OrderRefundResponseData
     */
    public function getData(): OrderRefundResponseData
    {
        return $this->data;
    }

}