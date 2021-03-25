<?php

use Opay\MerchantTransaction;
use Opay\Payload\TransactionInitializeRequest;
use Opay\Payload\TransactionInputDobRequest;
use Opay\Payload\TransactionInputOtpRequest;
use Opay\Payload\TransactionInputPhoneRequest;
use Opay\Payload\TransactionInputPinRequest;
use Opay\Payload\TransactionStatusRequest;
use Opay\Result\Response;

require_once('../Initialize.php');
require_once('../Config.php');

class Transaction extends Initialize
{
    private $transaction;

    public function __construct()
    {
        parent::__construct(new Config());
        $this->transaction = new MerchantTransaction($this->config->getEndpointBaseUrl(), $this->config->getPubKey(), $this->config->getPrvKey(), $this->config->getMerchantId());
    }

    public function initByToken(): Response
    {
        $request = new TransactionInitializeRequest();
        $request->setReference($this->getReference());
        $request->setAmount("100");
        $request->setCurrency("NGN");
        $request->setCountry("NG");
        $request->setPayType("token");
        $request->setToken("xxxx");
        $request->setCustomerPhone("+2348686868686");
        $request->setCustomerEmail("123@qq.com");
        $request->setReason("transaction reason message");
        $request->setCallbackUrl("https://you.domain.com/callbackUrl");
        $request->setExpireAt("100");
        return $this->init($request);
    }

    public function initByBankcard(): Response
    {
        $request = new TransactionInitializeRequest();
        $request->setReference($this->getReference());
        $request->setAmount("100");
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
        return $this->init($request);
    }

    public function initByBankaccount(): Response
    {
        $request = new TransactionInitializeRequest();
        $request->setReference($this->getReference());
        $request->setAmount("100");
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
        return $this->init($request);
    }

    public function init(TransactionInitializeRequest $request): Response
    {
        $this->transaction->setInitializeData($request);
        return $this->transaction->initialize();
    }

    public function setDob(): Response
    {
        $request = new TransactionInputDobRequest();
        $request->setOrderNo($this->getOrderNumber());
        $request->setReference($this->getReference());
        $request->setDob("12/12/2021");
        $this->transaction->setInputDobData($request);
        return $this->transaction->inputDob();
    }

    public function setOtp(): Response
    {
        $request = new TransactionInputOtpRequest();
        $request->setOrderNo($this->getOrderNumber());
        $request->setReference($this->getReference());
        $request->setOtp("123456");

        $this->transaction->setInputOtpData($request);
        return $this->transaction->inputOtp();
    }

    public function setPhone(): Response
    {
        $request = new TransactionInputPhoneRequest();
        $request->setOrderNo($this->getOrderNumber());
        $request->setReference($this->getReference());
        $request->setPhone("+23401234567889");

        $this->transaction->setInputPhoneData($request);
        return $this->transaction->inputPhone();
    }

    public function setPin(): Response
    {
        $request = new TransactionInputPinRequest();
        $request->setOrderNo($this->getOrderNumber());
        $request->setReference($this->getReference());
        $request->setPin("123456");

        $this->transaction->setInputPinData($request);
        return $this->transaction->inputPin();
    }

    public function getStatus(): Response
    {
        $request = new TransactionStatusRequest();
        $request->setOrderNo($this->getOrderNumber());
        $request->setReference($this->getReference());

        $this->transaction->setStatusData($request);
        return $this->transaction->status();
    }

}
