<?php
require_once('../init.php');

use Opay\MerchantCertPay;
use Opay\Payload\CertPayStatusRequest;

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantCertPay = new MerchantCertPay($endpointBaseUrl, $pubKey, $prvKey, $merchantId);

$request = new CertPayStatusRequest();
$request->setReference("test_20191123132233");
$request->setOrderNo("20019212912901281821982");

$merchantCertPay->setCloseData($request);
$response = $merchantCertPay->close();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}