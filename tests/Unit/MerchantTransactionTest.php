<?php

namespace Tests\Unit;

use Opay\MerchantTransaction;
use Opay\Payload\TransactionInitializeRequest;
use PHPUnit\Framework\TestCase;

class MerchantTransactionTest extends TestCase
{
    protected $transaction;

    protected function setUp(): void
    {
        parent::setUp();
        $this->transaction = new MerchantTransaction(
            "http://xxxxxxxxxxxxxxx.com",
            "xxxxxxxxxxxxxxxx",
            "xxxxxxxxxxxxx",
            "XXXXXXXXXXXXX"
        );
    }

    public function testInitializeByToken()
    {
        $request = new TransactionInitializeRequest();
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
        $this->transaction->setInitializeData($request);
        $response = $this->transaction->initialize();
        $this->assertEquals(json_encode($request, JSON_UNESCAPED_SLASHES), json_encode($this->transaction->getInitializeData(), JSON_UNESCAPED_SLASHES));

    }

    public function testInitializeByBankcard()
    {
        $request = new TransactionInitializeRequest();
        $request->setReference("test_2019112313223344");
        $request->setAmount("1000");
        $request->setCurrency("NGN");
        $request->setCountry("NG");
        $request->setPayType("bankcard");
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
        $this->transaction->setInitializeData($request);
        $response = $this->transaction->initialize();
        $this->assertEquals(json_encode($request, JSON_UNESCAPED_SLASHES), json_encode($this->transaction->getInitializeData(), JSON_UNESCAPED_SLASHES));
    }

    public function testInitializeByBankaccount()
    {
        $request = new TransactionInitializeRequest();
        $request->setReference("test_2019112313223344");
        $request->setAmount("1000");
        $request->setCurrency("NGN");
        $request->setCountry("NG");
        $request->setPayType("bankaccount");
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
        $this->transaction->setInitializeData($request);
        $response = $this->transaction->initialize();
        $this->assertEquals(json_encode($request, JSON_UNESCAPED_SLASHES), json_encode($this->transaction->getInitializeData(), JSON_UNESCAPED_SLASHES));
    }
}