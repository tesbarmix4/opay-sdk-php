<?php

use Opay\MerchantBills;
use Opay\Payload\BillsValidateRequest;

require_once('../init.php');


/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantBills = new MerchantBills($endpointBaseUrl, $pubKey, $prvKey, $merchantId);

$request = new BillsValidateRequest();
$request->setProvider("NAIRABET");
$request->setCustomerId("20019212912901281821982");
$request->setServiceType("betting");

$merchantBills->setValidateData($request);
$response = $merchantBills->validate();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}