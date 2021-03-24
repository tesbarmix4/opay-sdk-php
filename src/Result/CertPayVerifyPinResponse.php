<?php


namespace Opay\Result;


use stdClass;

class CertPayVerifyPinResponse extends Response
{

    static function parseData(?stdClass $s): CertPayVerifyPinResponseData
    {
        return CertPayVerifyPinResponseData::cast(new CertPayVerifyPinResponseData(), $s);
    }

    public function getData(): CertPayVerifyPinResponseData
    {
        return $this->data;
    }
}