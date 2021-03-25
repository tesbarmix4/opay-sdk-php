<?php


namespace Opay\Result;


use stdClass;

class TransferBatchToWalletResponse extends Response
{

    static function parseData(?stdClass $s): TransferBatchToWalletResponseData
    {
        return TransferBatchToWalletResponseData::cast(new TransferBatchToWalletResponseData, $s);
    }

    public function getData(): TransferBatchToWalletResponseData
    {
        return $this->data;
    }
}