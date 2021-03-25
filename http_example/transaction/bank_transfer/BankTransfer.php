<?php

use Opay\MerchantTransaction;
use Opay\Payload\TransactionBankTransferInitializeRequest;
use Opay\Payload\TransactionBankTransferStatusRequest;
use Opay\Result\Response;

require_once('../../Initialize.php');
require_once('../../Config.php');

class BankTransfer extends Initialize
{
    private $transaction;

    public function __construct()
    {
        parent::__construct(new Config());
        $this->transaction = new MerchantTransaction($this->config->getEndpointBaseUrl(), $this->config->getPubKey(), $this->config->getPrvKey(), $this->config->getMerchantId());
    }

    public function init(): Response
    {
        $request = new TransactionBankTransferInitializeRequest();
        $request->setReference($this->getReference());
        $request->setProductDesc("The best wireless earphone in history");
        $request->setUserPhone("+2348686868686");
        $request->setUserRequestIp($this->getUserIP());
        $request->setAmount("1000");
        $request->setCurrency("NGN");
        $request->setCallbackUrl("https://you.domain.com/callbackUrl");
        $request->setExpireAt("100");

        $this->transaction->setBankTransferInitializeData($request);
        return $this->transaction->bankTransferInitialize();
    }

    public function getStatus(): Response
    {
        $request = new TransactionBankTransferStatusRequest();
        $request->setReference($this->getReference());
        $request->setOrderNo($this->getOrderNumber());

        $this->transaction->setBankTransferStatusData($request);
        return $this->transaction->bankTransferStatus();
    }
}

/**
 * Initialize a bankTransfer transaction.
 */
$obj = new BankTransfer();
$response = $obj->init();
dump($response);


/**
 * Query a bankTransfer transaction's status
 */
$status = $obj->getStatus();
dump($status);