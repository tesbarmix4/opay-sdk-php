<?php


namespace Opay\Result;


use stdClass;

class CertPaySendOtpResponse extends Response
{

    static function parseData(?stdClass $s): CertPaySendOtpResponseData
    {
        return CertPaySendOtpResponseData::cast(new CertPaySendOtpResponseData(), $s);
    }

    public function getData(): CertPaySendOtpResponseData
    {
        return $this->data;
    }
}