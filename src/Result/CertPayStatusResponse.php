<?php


namespace Opay\Result;


use stdClass;

class CertPayStatusResponse extends Response
{

    static function parseData(?stdClass $s): CertPayStatusResponseData
    {
        return CertPayStatusResponseData::cast(new CertPayStatusResponseData(), $s);
    }

    public function getData(): CertPayStatusResponseData
    {
        return $this->data;
    }
}