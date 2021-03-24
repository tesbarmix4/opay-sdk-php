<?php
require_once('../init.php');

use Opay\MerchantTransaction;
use Opay\Payload\TransactionInputPhoneRequest;

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantTransaction = new MerchantTransaction($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new TransactionInputPhoneRequest();
$request->setOrderNo("20019212912901281821982");
$request->setReference("test_20191123132233");
$request->setPhone("+23401234567889");

$merchantTransaction->setInputPhoneData($request);
$response = $merchantTransaction->getInputPhone();

dump("status : ". $response->getCode());

if($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}