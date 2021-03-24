<?php


namespace Opay\Result;


use stdClass;

class InfoUserSendOtpResponse extends Response
{

    static function parseData(?stdClass $s): InfoUserSendOtpResponseData
    {
        return InfoUserSendOtpResponseData::cast(new InfoUserSendOtpResponseData(), $s);
    }

    public function getData(): InfoUserSendOtpResponseData
    {
        return $this->data;
    }
}