<?php

use Opay\MerchantInfo;
use Opay\Payload\InfoUserSendOtpRequest;

require_once('../../init.php');

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantInfo = new MerchantInfo($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new InfoUserSendOtpRequest();
$request->setPhoneNumber("+2349876543210");

$merchantInfo->setUserSendOtpData($request);
$response = $merchantInfo->userSendOtp();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}