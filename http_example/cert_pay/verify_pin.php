<?php
require_once('../init.php');

use Opay\MerchantCertPay;
use Opay\Payload\CertPayVerifyPinRequest;

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantCertPay = new MerchantCertPay($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new CertPayVerifyPinRequest();
$request->setReference("test_20191123132233");
$request->setOrderNo("20019212912901281821982");
$request->setUserPhone("+2341234567890");
$request->setPin("123456");


$merchantCertPay->setVerifyPinData($request);
$response = $merchantCertPay->verifyPIN();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}