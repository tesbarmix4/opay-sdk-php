<?php
require_once('../init.php');

use Opay\MerchantTransaction;
use Opay\Payload\TransactionInputDobRequest;

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantTransaction = new MerchantTransaction($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new TransactionInputDobRequest();
$request->setOrderNo("20019212912901281821982");
$request->setReference("test_20191123132233");
$request->setDob("dd/MM/yyyy");

$merchantTransaction->setInputDobData($request);
$response = $merchantTransaction->inputDob();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}