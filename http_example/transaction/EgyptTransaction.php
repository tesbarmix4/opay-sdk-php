<?php

use Opay\MerchantTransaction;
use Opay\Payload\EgyptTransactionCreateRequest;
use Opay\Payload\EgyptTransactionStatusRequest;
use Opay\Payload\TransactionInitializeRequest;
use Opay\Payload\TransactionInputDobRequest;
use Opay\Payload\TransactionInputOtpRequest;
use Opay\Payload\TransactionInputPhoneRequest;
use Opay\Payload\TransactionInputPinRequest;
use Opay\Payload\TransactionStatusRequest;
use Opay\Result\Response;

require_once('../Initialize.php');
require_once('../Config.php');

class EgyptTransaction extends Initialize
{
    private $transaction;

    public function __construct()
    {
        parent::__construct(new Config());
        $this->transaction = new MerchantTransaction($this->config->getEndpointBaseUrl(), $this->config->getPubKey(), $this->config->getPrvKey(), $this->config->getMerchantId());
    }

    public function create(): Response
    {
        $request = new EgyptTransactionCreateRequest();
        $request->setReference($this->getReference());
        $request->setRemark('remark');
        $request->setUserClientIP($this->getUserIP());
        $request->setAmountTotal(100);
        $request->setAmountCurrency('EGP');
        $request->setProductName("test transaction name");
        $request->setProductDescription("test transaction name description");
        $request->setCallbackUrl($this->config->getHostBaseUrl() . '/cashier/CashierCallback.php');
        $request->setReturnUrl($this->config->getHostBaseUrl() . '/success.php');
        $this->transaction->setEgyptCreateData($request);
        $response = $this->transaction->egyptCreate();
        if ($response->getCode() == '00000') {
            $this->setOrderNumber($response->getData()->getOrderNo());
        }
        return $response;

    }

    public function status(): Response
    {
        $request = new EgyptTransactionStatusRequest();
        $request->setReference($this->getReference());
        $request->setOrderNo($this->getOrderNumber());
        $this->transaction->setEgyptStatusData($request);
        return $this->transaction->egyptStatus();
    }
}


$transaction = new EgyptTransaction();
echo json_encode($transaction->create());

echo json_encode($transaction->status());