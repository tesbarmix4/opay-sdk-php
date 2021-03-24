<?php


namespace Opay\Result;


use stdClass;

class TransactionBankTransferStatusResponse extends Response
{
    static function parseData(?stdClass $s): TransactionBankTransferStatusResponseData
    {
        return TransactionBankTransferStatusResponseData::cast(new TransactionBankTransferStatusResponseData, $s);
    }

    public function getData(): TransactionBankTransferStatusResponseData
    {
        return $this->data;
    }

}