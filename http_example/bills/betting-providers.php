<?php

use Opay\MerchantBills;
use Opay\Payload\BillsBettingProvidersRequest;

require_once('../init.php');


/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantBills = new MerchantBills($endpointBaseUrl, $pubKey, $prvKey, $merchantId);

$request = new BillsBettingProvidersRequest();

$merchantBills->setBettingProvidersData($request);
$response = $merchantBills->bettingProviders();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}