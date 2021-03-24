<?php


namespace Opay\Result;


use stdClass;

class CertPayCloseResponse extends Response
{

    static function parseData(?stdClass $s): CertPayCloseResponseData
    {
        return CertPayCloseResponseData::cast(new CertPayCloseResponseData(), $s);
    }

    public function getData(): CertPayCloseResponseData
    {
        return $this->data;
    }
}