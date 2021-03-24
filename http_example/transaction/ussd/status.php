<?php
require_once('../../init.php');

use Opay\MerchantTransaction;
use Opay\Payload\TransactionBankTransferInitializeRequest;
use Opay\Payload\TransactionBankTransferStatusRequest;
use Opay\Payload\TransactionUssdStatusRequest;

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantTransaction = new MerchantTransaction($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new TransactionUssdStatusRequest();
$request->setReference("test_201911231322334");
$request->setOrderNo("20019212912901281821982");

$merchantTransaction->setUssdStatusData($request);
$response = $merchantTransaction->getUssdStatus();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}