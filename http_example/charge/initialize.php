<?php
require_once('../init.php');

use Opay\MerchantCharge;
use Opay\Payload\ChargeInitializeRequest;

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantCharge = new MerchantCharge($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new ChargeInitializeRequest();
$request->setReference("test_20191123132233");
$request->setAmount("1000");
$request->setCurrency("NGN");
$request->setUserRequestIp("123.123.123.123");
$request->setCallbackUrl("https://you.domain.com/callbackUrl");
$request->setReturnUrl("https://your.domain.com/returnUrl");
$request->setExpireAt("100");
$request->setChargerType("USER");
$request->setChargerId("156619112022589929");

$merchantCharge->setChargeInitializeData($request);
$response = $merchantCharge->chargeInitialize();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}