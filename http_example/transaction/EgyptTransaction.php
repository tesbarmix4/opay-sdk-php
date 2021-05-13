<?php

use Opay\MerchantTransaction;
use Opay\Payload\EgyptTransactionCreateRequest;
use Opay\Payload\EgyptTransactionRefundRequest;
use Opay\Payload\EgyptTransactionRefundStatusRequest;
use Opay\Payload\EgyptTransactionReversalRequest;
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
        $request->setReference('test_2021051111483427759');
        $request->setOrderNo('10210511100000001068');
        $this->transaction->setEgyptStatusData($request);
        return $this->transaction->egyptStatus();
    }


    public function refund(): Response
    {
        $request = new EgyptTransactionRefundRequest();
        $request->setReference('test_2021051111483427759');
        $request->setOrderNo('10210511100000001068');
        $this->transaction->setEgyptRefundData($request);
        return $this->transaction->egyptRefund();
    }

    public function refundStatus(): Response
    {
        $request = new EgyptTransactionRefundStatusRequest();
        $request->setOrderNo('10210511100000001068');
        $this->transaction->setEgyptRefundStatusData($request);
        return $this->transaction->egyptRefundStatus();
    }

    public function reversal(): Response
    {
        $request = new EgyptTransactionReversalRequest();
        $request->setReference('test_2021051111483427759');
        $request->setOrderNo('10210511100000001068');
        $this->transaction->setEgyptReversalData($request);
        return $this->transaction->egyptReversal();
    }

}


$transaction = new EgyptTransaction();
//echo json_encode($transaction->create());
//echo json_encode($transaction->status());
//echo json_encode($transaction->refund());
//echo json_encode($transaction->refundStatus());
echo json_encode($transaction->reversal());