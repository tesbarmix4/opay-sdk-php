<?php
require_once('../init.php');

use Opay\MerchantTransaction;
use Opay\Payload\TransactionInputPhoneRequest;
use Opay\Payload\TransactionInputPinRequest;

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantTransaction = new MerchantTransaction($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new TransactionInputPinRequest();
$request->setOrderNo("20019212912901281821982");
$request->setReference("test_20191123132233");
$request->setPin("123456");

$merchantTransaction->setInputPinData($request);
$response = $merchantTransaction->getInputPin();

dump("status : ". $response->getCode());

if($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}