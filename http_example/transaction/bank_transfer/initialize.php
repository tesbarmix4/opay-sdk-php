<?php
require_once('../../init.php');

use Opay\MerchantTransaction;
use Opay\Payload\TransactionBankTransferInitializeRequest;

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantTransaction = new MerchantTransaction($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new TransactionBankTransferInitializeRequest();
$request->setReference("test_20191123132233");
$request->setProductDesc("The best wireless earphone in history");
$request->setUserPhone("+2348686868686");
$request->setUserRequestIp("123.123.123.123");
$request->setAmount("1000");
$request->setCurrency("NGN");
$request->setCallbackUrl("https://you.domain.com/callbackUrl");
$request->setExpireAt("100");

$merchantTransaction->setBankTransferInitializeData($request);
$response = $merchantTransaction->bankTransferInitialize();

dump("status : " . $response->getCode());

if ($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}