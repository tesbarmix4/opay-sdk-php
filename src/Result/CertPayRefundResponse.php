<?php


namespace Opay\Result;


use stdClass;

class CertPayRefundResponse extends Response
{

    static function parseData(?stdClass $s): CertPayRefundResponseData
    {
        return CertPayRefundResponseData::cast(new CertPayRefundResponseData(), $s);
    }

    public function getData(): CertPayRefundResponseData
    {
        return $this->data;
    }
}