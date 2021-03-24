<?php

use Opay\MerchantBills;
use Opay\Payload\BillsBulkBillsRequest;
use Opay\Payload\BillsBulkStatusRequest;
use Opay\Payload\BulkBillsData;
use Opay\Payload\BulkStatusData;

require_once('../init.php');


/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantBills = new MerchantBills($endpointBaseUrl, $pubKey, $prvKey, $merchantId);

$request = new BillsBulkStatusRequest();
$request->setServiceType("betting");
$request->setBulkStatusRequest([]);

$bulkData = new BulkStatusData();
$bulkData->setOrderNo("20019212912901281821983");
$bulkData->setReference("test_20191123132233");

$request->setBulkStatusRequest([$bulkData->toArray()]);

$merchantBills->setBulkStatusData($request);
$response = $merchantBills->bulkStatus();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}