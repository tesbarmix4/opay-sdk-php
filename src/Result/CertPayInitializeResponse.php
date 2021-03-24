<?php


namespace Opay\Result;


use stdClass;

class CertPayInitializeResponse extends Response
{

    static function parseData(?stdClass $s): CertPayInitializeResponseData
    {
        return CertPayInitializeResponseData::cast(new CertPayInitializeResponseData(), $s);
    }

    public function getData(): CertPayInitializeResponseData
    {
        return $this->data;
    }
}