<?php

use Opay\MerchantInfo;
use Opay\Payload\InfoMerchantRequest;

require_once('../init.php');

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantInfo = new MerchantInfo($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new InfoMerchantRequest();
$request->setEmail("abc@123.com");

$merchantInfo->setMerchantData($request);
$response = $merchantInfo->merchant();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}