<?php
require_once('../init.php');

use Opay\MerchantCharge;
use Opay\Payload\ChargeStatusRequest;

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantCharge = new MerchantCharge($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new ChargeStatusRequest();
$request->setReference("test_201911231322334");
$request->setOrderNo("20019212912901281821982");

$merchantCharge->setChargeStatusData($request);
$response = $merchantCharge->getChargeStatus();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}