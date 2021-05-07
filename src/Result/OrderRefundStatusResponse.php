<?php

namespace Opay\Result;

class OrderRefundStatusResponse extends Response
{

    static function parseData(?\stdClass $s): OrderRefundStatusResponseData
    {
        return OrderRefundStatusResponseData::cast(new OrderRefundStatusResponseData(), $s);
    }

    /**
     * @return OrderRefundStatusResponseData
     */
    public function getData(): OrderRefundStatusResponseData
    {
        return $this->data;
    }

}