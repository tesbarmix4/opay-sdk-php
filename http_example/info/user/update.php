<?php

use Opay\MerchantInfo;
use Opay\Payload\InfoUserUpdateRequest;

require_once('../../init.php');

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantInfo = new MerchantInfo($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new InfoUserUpdateRequest();
$request->setPhoneNumber("+2349876543210");
$request->setEmail("Jerry@gmail.com");
$request->setFirstName("Jerry");
$request->setLastName("Li");
$request->setAddress("No 1. Star Garden, Lagos");

$merchantInfo->setUserUpdateData($request);
$response = $merchantInfo->userUpdate();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}