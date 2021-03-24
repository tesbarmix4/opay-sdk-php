<?php

use Opay\MerchantInfo;
use Opay\Payload\InfoUserCreateRequest;

require_once('../../init.php');

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantInfo = new MerchantInfo($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new InfoUserCreateRequest();
$request->setPhoneNumber("+2349876543210");
$request->setEmail("Jerry@gmail.com");
$request->setFirstName("Jerry");
$request->setLastName("Li");
$request->setPassword("123456");
$request->setAddress("No 1. Star Garden, Lagos");
$request->setOtp("123456");

$merchantInfo->setUserCreateData($request);
$response = $merchantInfo->userCreate();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}