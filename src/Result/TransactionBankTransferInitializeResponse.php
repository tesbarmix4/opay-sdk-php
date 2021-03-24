<?php


namespace Opay\Result;


use stdClass;

class TransactionBankTransferInitializeResponse extends Response
{
    static function parseData(?stdClass $s): TransactionBankTransferInitializeResponseData
    {
        return TransactionBankTransferInitializeResponseData::cast(new TransactionBankTransferInitializeResponseData, $s);
    }

    public function getData(): TransactionBankTransferInitializeResponseData
    {
        return $this->data;
    }

}