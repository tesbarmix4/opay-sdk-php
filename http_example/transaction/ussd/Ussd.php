<?php


use Opay\MerchantTransaction;
use Opay\Payload\TransactionUssdInitializeRequest;
use Opay\Payload\TransactionUssdStatusRequest;
use Opay\Result\Response;

require_once('../../Initialize.php');
require_once('../../Config.php');

class Ussd extends Initialize
{
    private $transaction;

    public function __construct()
    {
        parent::__construct(new Config());
        $this->transaction = new MerchantTransaction($this->config->getEndpointBaseUrl(), $this->config->getPubKey(), $this->config->getPrvKey(), $this->config->getMerchantId());
    }

    public function init(): Response
    {
        $request = new TransactionUssdInitializeRequest();
        $request->setReference($this->getReference());
        $request->setProductDesc("The best wireless earphone in history");
        $request->setUserPhone("+2348686868686");
        $request->setUserRequestIp($this->getUserIP());
        $request->setAmount("100");
        $request->setCurrency("NGN");
        $request->setCallbackUrl("https://you.domain.com/callbackUrl");
        $request->setExpireAt("100");
        $request->setBankCode("070");

        $this->transaction->setUssdInitializeData($request);
        return $this->transaction->ussdInitialize();
    }

    public function getStatus(): Response
    {
        $request = new TransactionUssdStatusRequest();
        $request->setReference($this->getReference());
        $request->setOrderNo($this->getOrderNumber());

        $this->transaction->setUssdStatusData($request);
        return $this->transaction->ussdStatus();
    }
}

/**
 * Initialize a ussd transaction.
 */
$obj = new Ussd();
$response = $obj->init();
dump($response);

/**
 * Query a ussd transaction's status
 */
$status = $obj->getStatus();
dump($status);

