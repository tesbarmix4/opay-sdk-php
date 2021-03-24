<?php

use Opay\MerchantInfo;
use Opay\Payload\InfoUserRequest;

require_once('../init.php');

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantInfo = new MerchantInfo($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new InfoUserRequest();
$request->setPhoneNumber("+2349876543210");

$merchantInfo->setUserData($request);
$response = $merchantInfo->user();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}