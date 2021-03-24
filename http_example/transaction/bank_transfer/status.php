<?php
require_once('../../init.php');

use Opay\MerchantTransaction;
use Opay\Payload\TransactionBankTransferInitializeRequest;
use Opay\Payload\TransactionBankTransferStatusRequest;

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantTransaction = new MerchantTransaction($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new TransactionBankTransferStatusRequest();
$request->setReference("test_20191123132233");
$request->setOrderNo("20019212912901281821982");

$merchantTransaction->setBankTransferStatusData($request);
$response = $merchantTransaction->bankTransferStatus();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}