<?php
require_once('../init.php');

use Opay\MerchantCertPay;
use Opay\Payload\CertPayRefundRequest;

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantCertPay = new MerchantCertPay($endpointBaseUrl, $pubKey, $prvKey, $merchantId);

$request = new CertPayRefundRequest();
$request->setReference("test_20191123132233");
$request->setRefundReference("rf_test_20191123132233");
$request->setCurrency("NGN");
$request->setOrderNo("20019212912901281821982");
$request->setRefundAmount("10000");

$merchantCertPay->setRefundData($request);
$response = $merchantCertPay->refund();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}