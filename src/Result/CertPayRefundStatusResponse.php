<?php


namespace Opay\Result;


use stdClass;

class CertPayRefundStatusResponse extends Response
{

    static function parseData(?stdClass $s): CertPayRefundStatusResponseData
    {
        return CertPayRefundStatusResponseData::cast(new CertPayRefundStatusResponseData(), $s);
    }

    public function getData(): CertPayRefundStatusResponseData
    {
        return $this->data;
    }
}