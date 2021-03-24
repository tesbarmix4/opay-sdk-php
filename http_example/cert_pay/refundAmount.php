<?php
require_once('../init.php');

use Opay\MerchantCertPay;
use Opay\Payload\CertPayRefundStatusRequest;

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantCertPay = new MerchantCertPay($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new CertPayRefundStatusRequest();
$request->setReference("test_20191123132233");
$request->setRefundReference("rf_test_20191123132233");
$request->setOrderNo("20019212912901281821982");
$request->setRefundOrderNo("30019212912901281821982");



$merchantCertPay->setRefundStatusData($request);
$response = $merchantCertPay->refundStatus();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}