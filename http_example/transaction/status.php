<?php
require_once('../init.php');

use Opay\MerchantTransaction;
use Opay\Payload\TransactionInputPhoneRequest;
use Opay\Payload\TransactionInputPinRequest;
use Opay\Payload\TransactionStatusRequest;

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantTransaction = new MerchantTransaction($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new TransactionStatusRequest();
$request->setOrderNo("20019212912901281821982");
$request->setReference("test_20191123132233");

$merchantTransaction->setStatusData($request);
$response = $merchantTransaction->getStatus();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}