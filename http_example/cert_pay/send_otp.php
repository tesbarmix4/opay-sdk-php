<?php
require_once('../init.php');

use Opay\MerchantCertPay;
use Opay\Payload\CertPaySendOtpRequest;

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantCertPay = new MerchantCertPay($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new CertPaySendOtpRequest();
$request->setReference("test_20191123132233");
$request->setOrderNo("20019212912901281821982");
$request->setPayMethod("payMethod");

$merchantCertPay->setSendOtpData($request);
$response = $merchantCertPay->sendOTP();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}