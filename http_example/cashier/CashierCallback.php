<?php

use Opay\MerchantCashier;
use Opay\Payload\OrderStatusRequest;
use Opay\Result\Response;

require_once('../Initialize.php');
require_once('../Config.php');

class CashierCallback extends Initialize
{
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
        $this->setOrderNumber($payload['transactionId']);
        $this->setReference($payload['reference']);
        dump($payload);
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

// Example of data posted in callback
// {
//     "payload": {
//         "country": "NG",
//         "instrumentId": "useless",
//         "fee": "0.00",
//         "channel": "Web",
//         "reference": "test_20196699559858800",
//         "updated_at": "2019-12-13T09:36:58Z",
//         "currency": "NGN",
//         "refunded": false,
//         "instrument-id": "useless",
//         "timestamp": "2019-12-13T09:36:58Z",
//         "amount": "0.10",
//         "instrumentType": "coins",
//         "instrument_id": "useless",
//         "transactionId": "191213140104849949",
//         "token": "191213140104849949",
//         "bussinessType": "Consumption_H5",
//         "payChannel": "BalancePayment",
//         "status": "failed"
//     },
//     "sha512": "9cc847600cb7104b0a5a48976e70cf74763eb69f123a282975de1c3a751128c12d437b1f7c7d4a24bdb82b79aaa477e98e81bc66be8e8d8c3c15cdfcea730553",
//     "type": "transaction-status"
// }
