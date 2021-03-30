<?php

use Opay\MerchantCashier;
use Opay\Payload\OrderStatusRequest;
use Opay\Result\Response;
use Opay\Tool\Helper;

require_once('../Initialize.php');
require_once('../Config.php');

class CashierCallback extends Initialize
{
    use Helper;

    private $merchantCashier;

    public function __construct()
    {
        parent::__construct(new Config());
        $this->merchantCashier = new MerchantCashier($this->config->getEndpointBaseUrl(), $this->config->getPubKey(), $this->config->getPrvKey(), $this->config->getMerchantId());
    }

    public function getContent(): Response
    {
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, TRUE); //convert JSON into array
        $payload = $input['payload'];
        $sign = $this->checkCallbackSignature($input, $this->config->getPrvKey());
        dump($sign);
        $this->setOrderNumber($payload['transactionId']);
        $this->setReference($payload['reference']);
        return $this->getStatus();
    }

    public function getStatus(): Response
    {
        $_orderStatusRequest = new OrderStatusRequest($this->getOrderNumber(), $this->getReference());
        $this->merchantCashier->orderStatus($_orderStatusRequest);
        return $this->merchantCashier->getOrderStatusApiResult();
    }
}

$obj = new CashierCallback();
$response = $obj->getContent();
dump($response);
/*
    {
        "payload":{
        "country":"NG",
            "instrumentId":"useless",
            "fee":"0.10",
            "channel":"Web",
            "displayedFailure":"",
            "reference":"3cae64cb5f68a7c4008b765b97401a",
            "updated_at":"2020-09-21T13:18:45Z",
            "currency":"NGN",
            "refunded":false,
            "instrument-id":"useless",
            "timestamp":"2020-09-21T13:18:45Z",
            "amount":"10.00",
            "instrumentType":"coins",
            "instrument_id":"useless",
            "transactionId":"200921144008250432",
            "token":"200921144008250432",
            "bussinessType":"Consumption_H5",
            "payChannel":"BalancePayment",
            "status":"successful"
        },
        "sha512":"d34fc7b433b226a591c261c0ef10b76e60cebfc07f27840b4e6640132b82e76d0cc7eba585fafc59e37355129c57a7b54b07ac2bc64296f40c3e987199684f62",
        "type":"transaction-status"
    }
*/
