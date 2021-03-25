<?php


namespace Opay\Result;


use stdClass;

class TransferBatchToBankResponse extends Response
{

    static function parseData(?stdClass $s): TransferBatchToBankResponseData
    {
        return TransferBatchToBankResponseData::cast(new TransferBatchToBankResponseData, $s);
    }

    public function getData(): TransferBatchToBankResponseData
    {
        return $this->data;
    }
}