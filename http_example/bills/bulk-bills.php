<?php

use Opay\MerchantBills;
use Opay\Payload\BillsBulkBillsRequest;
use Opay\Payload\BulkBillsData;

require_once('../init.php');


/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantBills = new MerchantBills($endpointBaseUrl, $pubKey, $prvKey, $merchantId);

$request = new BillsBulkBillsRequest();
$request->setCallBackUrl("callBackUrl");
$request->setServiceType("betting");

$bulkData = new BulkBillsData();
$bulkData->setAmount("1000100");
$bulkData->setCountry("NG");
$bulkData->setCurrency("NGN");
$bulkData->setCustomerId("014562021");
$bulkData->setProvider("NAIRABET");
$bulkData->setReference("123333330002");

$request->setBulkData([$bulkData->toArray()]);

$merchantBills->setBulkBillsData($request);
$response = $merchantBills->bulkBills();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}