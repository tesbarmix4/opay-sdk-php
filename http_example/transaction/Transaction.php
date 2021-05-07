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

    /**
     * Not Recommended
     * @return Response
     */
    public function initByToken(): Response
    {
        $request = new TransactionInitializeRequest();
        $request->setReference($this->getReference());
        $request->setAmount("100");
        $request->setCurrency("NGN");
        $request->setCountry("NG");
        $request->setPayType("token");
        $request->setToken("BDEFDFDFE43F4DGD2");
        $request->setCustomerPhone("+2348686868686");
        $request->setCustomerEmail("123@qq.com");
        $request->setReason("transaction reason message");
        $request->setCallbackUrl("https://you.domain.com/callbackUrl");
        $request->setExpireAt("100");
        return $this->init($request);
    }

    public function initByBankcard($currency = 'NGN', $country = 'NG'): Response
    {
        $request = new TransactionInitializeRequest();
        $request->setReference($this->getReference());
        $request->setAmount("100");
        $request->setCurrency($currency);
        $request->setCountry($country);
        $request->setPayType("bankcard");
        $request->setFirstName("li");
        $request->setLastName("jian");
        $request->setCustomerPhone("+234xxxxxxxx");
        $request->setCustomerEmail("dd@opay-inc.com");
        $request->setCardNumber("5061460410121111105");
        $request->setCardDateMonth("12");
        $request->setCardDateYear("22");
        $request->setCardCVC("561");
        $request->setReturn3dsUrl("http://www.your.domain.com");
        $request->setBankAccountNumber("256620112018025");
        $request->setBankCode("033");
        $request->setReason("transaction reason message");
        $request->setCallbackUrl("https://you.domain.com/callbackUrl");
        $request->setExpireAt("100");
        if ($currency == "USD") {
            $request->setBillingZip("sc");
            $request->setBillingCity("ca");
            $request->setBillingAddress("address");
            $request->setBillingState("NY");
            $request->setBillingCountry("US");
        }
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
        $request->setOtp("543210");

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
        $request->setPin("1105");

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

    public function exec($case): string
    {
        switch ($case) {
            case 'INPUT-PIN':
            {
                $url = 'html/input-pin.html?ref=' . $this->getReference();
                break;
            }
            case 'INPUT-OTP':
            {
                $url = 'html/input-otp.html?ref=' . $this->getReference();
                break;
            }
            case 'INPUT-PHONE':
            {
                $url = 'html/input-phone.html?ref=' . $this->getReference();
                break;
            }
            case 'INPUT-DOB':
            {
                $url = 'html/input-dob.html?ref=' . $this->getReference();
                break;
            }
            case 'SUCCESS':
            {
                $url = 'html/success.html?ref=' . $this->getReference();
                break;
            }
            default:
            {
                $url = '';
                break;
            }
        }
        return $url;
    }

    public function getContent()
    {
        $response = null;
        $type = $_GET['type'];
        if ($type == 'init') {
            $action = $_GET['action'];
            switch ($action) {
                case 'token':
                {
                    $response = $this->initByToken();
                    break;
                }
                case 'bankaccount':
                {
                    $response = $this->initByBankaccount();
                    break;
                }
                case 'bankcard_usd':
                {
                    $response = $this->initByBankcard("USD","USA");
                    break;
                }
                case 'bankcard':
                {
                    $response = $this->initByBankcard();
                    break;
                }
            }
        } else {
            $ref = $_GET['ref'];
            $this->setReference($ref);
            $action = $_GET['action'];
            switch ($action) {
                case 'otp':
                {
                    $response = $this->setOtp();
                    break;
                }
                case 'pin':
                {
                    $response = $this->setPin();
                    break;
                }
                case 'phone':
                {
                    $response = $this->setPhone();
                    break;
                }
                case 'dob':
                {
                    $response = $this->setDob();
                    break;
                }
            }
        }
        if ($response->getCode() == '00000') {
            $url = '';
            for (; ;) {
                $response = $this->getStatus();
                $case = $response->getData()->getStatus();
                $url = $this->exec($case);
                if ($url != '') {
                    break;
                }
            }
            Header("Location: $url");
        }
        dump($response);
    }
}

(new Transaction)->getContent();
