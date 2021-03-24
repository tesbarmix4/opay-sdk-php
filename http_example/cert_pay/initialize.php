<?php
require_once('../init.php');

use Opay\MerchantCertPay;
use Opay\Payload\CertPayInitializeRequest;

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantCertPay = new MerchantCertPay($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new CertPayInitializeRequest();
$request->setReference("test_20191123132233");
$request->setUserPhone("+2341234567890");
$request->setAmount("1000");
$request->setCurrency("NGN");
$request->setUserRequestIp("123.123.123.123");
$request->setProductName("iPhone X");
$request->setProductDesc("The best iPhone");
$request->setExpireAt("100");


$merchantCertPay->setInitializeData($request);
$response = $merchantCertPay->initialize();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}