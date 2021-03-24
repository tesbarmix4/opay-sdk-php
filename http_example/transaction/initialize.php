<?php
require_once('../init.php');

use Opay\MerchantTransaction;
use Opay\Payload\TransactionInitializeRequest;

/**
 * @var  $endpointBaseUrl
 * @var  $pubKey
 * @var  $prvKey
 * @var  $merchantId
 */
$merchantTransaction = new MerchantTransaction($endpointBaseUrl, $pubKey, $prvKey, $merchantId);


$request = new TransactionInitializeRequest();
$request->setPayType("bankaccount");

if ($request->getPayType() == "token") {

    $request->setReference("test_20191123132233");
    $request->setAmount("10");
    $request->setCurrency("NGN");
    $request->setCountry("NG");
    $request->setPayType("token");
    $request->setToken("xxxx");
    $request->setCustomerPhone("+2348686868686");
    $request->setCustomerEmail("123@qq.com");
    $request->setReason("transaction reason message");
    $request->setCallbackUrl("https://you.domain.com/callbackUrl");
    $request->setExpireAt("100");
} else if ($request->getPayType() == "bankcard") {

    $request->setReference("test_2019112313223344");
    $request->setAmount("1000");
    $request->setCurrency("NGN");
    $request->setCountry("NG");
    $request->setFirstName("firstName");
    $request->setLastName("lastName");
    $request->setCustomerEmail("123@qq.com");
    $request->setCardNumber("4392xxxxxxxxxxxx");
    $request->setCardDateMonth("01");
    $request->setCardDateYear("22");
    $request->setCardCVC("122");
    $request->setReturn3dsUrl("http://www.your.domain.com");
    $request->setBankAccountNumber("22445566787");
    $request->setBankCode("057");
    $request->setReason("transaction reason message");
    $request->setCallbackUrl("https://you.domain.com/callbackUrl");
    $request->setExpireAt("100");
    $request->setBillingZip("xxx");
    $request->setBillingCity("xxx");
    $request->setBillingAddress("xxx");
    $request->setBillingState("xxx");
    $request->setBillingCountry("xxx");

} else if ($request->getPayType() == "bankaccount") {

    $request->setReference("test_201911231322334446");
    $request->setAmount("1000");
    $request->setCurrency("NGN");
    $request->setCountry("NG");
    $request->setBankAccountNumber("22445566787");
    $request->setBankCode("057");
    $request->setReturn3dsUrl("http://www.your.domain.com");
    $request->setReason("transaction reason message");
    $request->setCustomerPhone("+2348686868686");
    $request->setBvn("1234567890");
    $request->setDobDay("20");
    $request->setDobMonth("04");
    $request->setDobYear("2021");
    $request->setCallbackUrl("https://you.domain.com/callbackUrl");
    $request->setExpireAt("100");

}

$merchantTransaction->setInitializeData($request);
$response = $merchantTransaction->initialize();

dump("status : ". $response->getCode());

if($response->getCode() === "00000") {
    dump($response->getData());
} else {
    dump($response);
}