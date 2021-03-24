<?php


namespace Opay\Result;


use stdClass;

class CertPayVerifyOtpResponse extends Response
{

    static function parseData(?stdClass $s): CertPayVerifyOtpResponseData
    {
        return CertPayVerifyOtpResponseData::cast(new CertPayVerifyOtpResponseData(), $s);
    }

    public function getData(): CertPayVerifyOtpResponseData
    {
        return $this->data;
    }
}